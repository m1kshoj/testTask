<?php

class ArrayRef
{
    private $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    public function test(): array
    {
        $result = array();
        foreach ($this->array as $object) {
            if (!isset($result[$object->category])) {
                $result[$object->category] = array();
            }
            $newObject = new stdClass();
            $newObject->id = $object->id;
            $result[$object->category][] = $newObject;
        }
        return $result;
    }

}

$array = array();
function get_arr(array $array): array
{
    $array[] = (object)array("id" => 1, "category" => "one");
    $array[] = (object)array("id" => 2, "category" => "two");
    $array[] = (object)array("id" => 3, "category" => "three");
    $array[] = (object)array("id" => 4, "category" => "one");
    $array[] = (object)array("id" => 5, "category" => "two");
    $array[] = (object)array("id" => 6, "category" => "three");
    $array[] = (object)array("id" => 7, "category" => "one");
    $array[] = (object)array("id" => 8, "category" => "two");
    $array[] = (object)array("id" => 9, "category" => "three");
    $array[] = (object)array("id" => 10, "category" => "one");
    return $array;
}

$array = get_arr($array);

$testFun = new ArrayRef($array);
$result = $testFun->test();

$save = 'result.txt';
file_put_contents($save, print_r($result, true));

echo "Результат сохранен в файле $save";
?>