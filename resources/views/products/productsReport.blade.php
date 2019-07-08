
<html>

<div style="width: 100%; border-bottom: 1px solid #e8e8e8; height: 30px;">
    <div style="float: left;">
        <label style="font-size: 18px;">IMPRISOL</label>
    </div>
    <br><br>
    <div style="float: left; width: 50px; heigth: 50px;">
        <img scr="<?php __DIR__?>../../../public/img/imprisol.jpg">
    </div>
    <div style="float: right;">
        <label style="font-size: 18px;">{{ $fecha }}</label>
    </div>
</div>
<div style="width: 100%; display: flex; justify-content: center; 
        align-items: center;">
    <h1 style="font-weight: 100; font-size: 30px; text-align: center;">
        ** Listado de Produtos **
    </h1>
</div>
<div style="width: 100%; padding-bottom: 8px;">
    <table style="width: 100%; border-color: #666666; border-style: dashed; border-width: 1px; padding-top: 5px;">        
        <thead>
            <tr>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Nro</th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Codigo </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Nombre </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px"> Marca </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px">Modelo </th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px">Precio Compra</th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px">Precio Venta</th>
                <th style="padding-bottom: 5px; border-color:#666666; border-right-style: dashed; border-width: 1px; padding: 2px">Caregoria</th>
            </tr>
        </thead>

        <tbody>
            {{ $nro = 1 }}
            @foreach ($products as $product)
                <tr>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $nro }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->code }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->name }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->brand }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->model }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->purchase_price }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->sale_cost }}</td>
                    <td style="border-color:#666666; border-top-style: dashed; border-right-style: dashed; border-width: 1px; padding: 2px">{{ $product->category->description }}</td>                    
                </tr>
                {{ $nro++ }}    
            @endforeach
            
        </tbody>
    </table>
</div>

</html>