<?php

namespace App\Filter\Modifier\Factory;

use App\Filter\Modifier\PriceModifierInterface;
use Symfony\Component\VarExporter\Exception\ClassNotFoundException;

class PriceModifierFactory implements PriceModifierFactoryInterface
{
    const PRICE_MODIFIER_NAMESPACE = "App\Filter\Modifier\\";

    public function create(string $modifierType): PriceModifierInterface
    {
        //convert type from snake_case to PascalCase
        $modifierClassBaseName = str_replace('_', '', ucwords($modifierType, '_'));

        $modifier = self::PRICE_MODIFIER_NAMESPACE . $modifierClassBaseName;

        if(!class_exists($modifier)) {
            throw new ClassNotFoundException($modifier);
        }

        return new $modifier();
    }
}