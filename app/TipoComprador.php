<?php

namespace App;

enum TipoComprador: string
{
    case PESSOA_FISICA = 'Comprador';
    case PESSOA_JURIDICA = 'Vendedor';
}
