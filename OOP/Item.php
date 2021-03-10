<?php namespace program;
/**
 * Класс для взаимодействия с БД
 *
 * При помощи класса можно получать и перезаписывать данные в БД
 */
final class Item
{
    private int $id;
    private string $name = "";
    private int $status;
    private bool $changed = false;

    /**
     * Переменная проверки вызова init()
     *
     * @var bool
     */
    private bool $isCall = false;

    /**
     * @param int $id id необходимой записи из БД
     */
    public function init(int $id)
    {
        if(!$this->isCall){
            $this->isCall = true;
            $this->_init($id);
        }
    }

    /**
     * Физика метода init()
     *
     * Метод делает выборку из БД по указаному id и записывает
     * в свойства объекта значения полей id, name и status
     *
     * @param int $id
     */
    private function _init(int $id)
    {
        $this->id = $id;
        $str = "SELECT name, status FROM objects WHERE id = '".$id."'";
        $row=queryMysql($str)->fetch_array(MYSQLI_ASSOC);
        $this->name = $row['name'];
        $this->status = $row['status'];
    }

    public function save(){
        $this->_save();
    }

    /**
     * Физика метода save()
     *
     * После проверки на изменение свойств объекта
     * метод перезаписывает данные в БД согласно
     * значениям свойств объекта
     */
    private function _save(){
        if($this->changed){
            $str = "UPDATE name = '".$this->name."' AND status = '".$this->status."' WHERE id = '".$this->id."'";
            queryMysql($str);
        }
    }

    public function __get($property)
    {
        if (property_exists($this, $property) && !(empty($this->$property))) {
            return $this->$property;
        }
        return null;
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property) && $property != "id" && !empty($value) && gettype($this->$property) == gettype($value) ) {
            $this->$property = $value;
            $this->changed = true;
        }
    }
}