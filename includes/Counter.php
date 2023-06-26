<?php

class Counter
{
    private $data = array();
    private $number;

    function __construct(int $n)
    {
        $this->number = $n;
        for($i = 1; $i <= $n; $i++)
        {
            $this->data[$i] = 1;
        }
    }

    public function getCounter() : string
    {
        $first = $this->data[1];
        $ret = "$first";
        for($i = 2; $i <= $this->number; $i++)
        {
            $other = $this->data[$i];
            $ret .= ".$other";
        }
        return $ret;
    }

    public function addCounter($order = 0)
    {
        if($order == 0 || $order > $this->number)
        {
            $this->data[$this->number]++;
        }
        else
        {
            $this->data[$order]++;
            for($i = $order + 1; $i <= $this->number; $i++)
            {
                $this->data[$i] = 1;
            }
        }
    }
}