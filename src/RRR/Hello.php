<?php
namespace RRR;

class Hello
{
    public function getHello($name)
    {
        return array(
            'name' => $name
        );
    }


    public function getOptions()
    {
        $nameProps = array(
            'name' => array(
                'description' => 'Name to return',
                'type' => 'string',
                'required' => false,
                'default' => 'World',
            )
        );

        $getProps = array(
            'description' => 'Display name in JSON',
            'examples' => array('/hello', '/hello/:name'),
            'properties' => $nameProps,
        );

        $options = array(
            'GET' => $getProps,
        );

        return $options;
    }
}
