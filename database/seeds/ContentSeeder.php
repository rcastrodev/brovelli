<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'order'     => 'AA',
                'image'     => 'images/home/Group3690.png',
                'content_1' => 'Accesorios y válvulas para cañerías',
                'content_2' => 'Contamos con todos los accesorios y repuestos que necesite para su hogar o industria'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/MaskGroup168.png',
            'content_1' => 'Brovelli y Cia S.R.L',
            'content_2' => '<p>Nuestra Empresa fue fundada por el Sr. Mario Brovelli en 1930 , dedicándose a la fabricación de elementos para el Agro, (Bebederos, Cilindros de bombeo y Zingería ).</p>
            <p>En el año 1998 nos trasladamos a nuestro actual domicilio ,José P. Varela 5714 Ciudad de Bs.As.,donde tenemos la Fabrica y disponemos de 550 M. de depósito para Atender a mas de 1100 clientes en todo el país.</p>
            <p>Como se aprecia, lo nuestro es una PYME familiar con el objetivo de máxima : La atención esmerada a nuestros clientes ,que en definitiva es el mayor capital de la empresa.</p>'
        ]);
          
        

        /** Empresa */

        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 3,
                'order'     => 'AA',
                'image'     => 'images/company/MaskGroup167.png',
                'content_1' => 'Empresa',
            ]);
        }

        Content::create([
            'section_id'=> 4,
            'content_1' => '<p>Nuestra empresa fue fundada por el Sr. Mario Brovelli en 1930 , dedicándose a la fabricación de elementos para el Agro, (bebederos, cilindros de bombeo y zingería). Recién en 1950 con la incorporación del Sr. Alberto Brovelli la empresa comenzó con la comercialización de accesorios para cañerías, e inmediatamente la fabricación de los mismos, pasando a ser ésta la actividad principal. En 1951 llega a la empresa el Sr. Juan Carlos Brovelli, primo de Alberto y ambos sobrinos del fundador. Por ese entonces la firma funcionaba en la calle Nicasio Oroño 2360 de Capital Federal.</p>
            <p>En los 70 la empresa se muda a su predio en la calle Melincué 3215 también en Capital y en el año 1998 nos trasladamos a nuestro actual domicilio, José P. Varela 5714 Ciudad de BuenosAires, donde tenemos la fábrica y disponemos de 550 mts. de depósito para atender a más de 1100 clientes en todo el país. Como se aprecia, lo nuestro es una PYME familiar con el objetivo de máxima: La atención esmerada a nuestros clientes, que en definitiva es el mayor capital de la empresa.</p>
            '
        ]);  

        Content::create([
            'section_id'=> 5,
            'order'     => 'AA',
            'image'     => 'images/company/001-office-building.png',
            'content_1' => 'Disponemos de 550 mts. de depósito',
        ]);

        Content::create([
            'section_id'=> 5,
            'order'     => 'BB',
            'image'     => 'images/company/002-discuss.png',
            'content_1' => 'Tenemos más de 1100 clientes en todo el país',
        ]);

        Content::create([
            'section_id'=> 6,
            'content_1' => '<p>En el año 1998 nos trasladamos a nuestro actual domicilio, José P. Varela 5714, Ciudad Autónoma de Buenos Aires, donde tenemos la fábrica y disponemos de 550 mts. de depósito para atender a más de 1100 clientes en todo el país.</p>',
        ]);

        Content::create([
            'section_id'=> 7,
            'order'     => 'AA',
            'image'     => 'images/news/Group3696.png',
            'content_1' => 'Nueva válvula esférica',
            'content_2' => '<h6>Caracteristicas</h6><ul><li>Flujo bidireccional</li><li>Máxima capacidad de caudal.</li><li>Paso total o Paso reducido (a elección)</li><li>Accionamiento a palanca, posibilidad de automatizar.</li><li>Construcción a prueba de fuego (fire safe).</li><li>Construccion con dispositivo antiestático.</li><li>Vástago inexpulsable.</li><li>Larga vida útil.</li><li>Alta resistencia a vibraciones y sobrepresiones.</li><li>Asientos autoajustebles.</li><li>Sistema de doble bloqueo y venteo.</li></ul>',
            'content_3' => 'PRODUCTOS',
        ]);  

        Content::create([
            'section_id'=> 8,
            'order'     => 'AA',
            'image'     => 'images/news/Group3696.png',
            'content_1' => 'Lista de precios Sanitarios',
            'content_2' => '<p>Accesorios Galvanizados, Accesorios Epoxi, Niples Galv.yEpoxi, Niples Sch 40/80, Cuplas Lisas Std.Sch 40/80, Accesorios Hierro Trefilado, Válvulas Esféricas de Retención, Exclusas, Canillería, Grifería, Válvulas de Pié, Filtros, Accesorios y Tuberías de Termofusión, Herramientas Gasista, Cabezales, Monturas Derivación, Flexibles en Bronce, Mallados-Inoxidable, Llaves de paso Gas Aprobadas, Electrobombas, Articulos en plasticos, Termocuplas</p>',
            'content_3' => 'true',
            'content_4' => 'true',
        ]); 
    }
}


