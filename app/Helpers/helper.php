<?php

function cartArray(): array
{
    $cartCollection = Cart::getContent();
    return $cartCollection->toArray();
}
