<?php

namespace App;

class Invoice
{
    private string $id;
    private string $date;
    private Customer $customer;
    private Seller  $seller;
    private array $items;
    private float $grossSum;

    public function __construct(string $id, string $date, Customer $customer,
                                Seller $seller, array $items, float $grossSum)
    {
        $this->id = $id;
        $this->date = $date;
        $this->customer = $customer;
        $this->seller = $seller;
        $this->items = $items;
        $this->grossSum = $grossSum;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function getSeller(): Seller
    {
        return $this->seller;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getGrossSum(): float
    {
        return $this->grossSum;
    }

}

class Customer
{
    private string $name;
    private string $address;
    private ?string $nip;

    public function __construct(string $name, string $address, ?string $nip)
    {
        $this->name = $name;
        $this->address = $address;
        $this->nip = $nip;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

}

class Seller
{
    private string $name;
    private string $address;
    private ?string $nip;

    public function __construct(string $name, string $address, ?string $nip)
    {
        $this->name = $name;
        $this->address = $address;
        $this->nip = $nip;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    function getNip(): ?string
    {
        return $this->nip;
    }

}

class Item
{
    private string $itemName;
    private int $quantity;
    private float $price;
    private float $vat;

    public function __construct(string $itemName, int $quantity, float $price, float $vat)
    {
        $this->itemName = $itemName;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->vat = $vat;
    }

    public function getItemName(): string
    {
        return $this->itemName;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVat(): float
    {
        return $this->vat;
    }

}