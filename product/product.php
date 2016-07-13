<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 7/12/16
 * Time: 10:44 AM
 */
class product
{
    /**
     * @var
     */
    private $product_name; // tên sản phẩm
    private $product_number; // mã số sản phẩm
    private $color;
    private $make_flag; // trang thai san phẩm  1: bán, 0 là chưa bán
    private $price; // giá sản phẩm
    private $image; // loại sản phẩm


    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getProductNumber()
    {
        return $this->product_number;
    }

    /**
     * @param mixed $product_number
     */
    public function setProductNumber($product_number)
    {
        $this->product_number = $product_number;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getMakeFlag()
    {
        return $this->make_flag;
    }

    /**
     * @param mixed $make_flag
     */
    public function setMakeFlag($make_flag)
    {
        $this->make_flag = $make_flag;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    } // màu sản phẩm



    public function __construct($product_name, $product_number, $color,$make_flag, $price,$image){
        $this->product_name  = $product_name;
        $this->product_number = $product_number;
        $this->color = $color;
        $this->make_flag  = $make_flag;
        $this->price = $price;
        $this->image = $image;
    }




}



