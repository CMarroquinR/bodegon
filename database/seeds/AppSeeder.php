<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'email' => 'admin@bodegon.com',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Usuario',
            'apellido' => 'Usuario',
            'email' => 'usuario@bodegon.com',
            'password' => bcrypt('usuario'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Maria',
            'apellido' => 'Castañeda',
            'email' => 'u1@bodegon.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Jorge',
            'apellido' => 'Guerrero',
            'email' => 'u2@bodegon.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'nombre' => 'Miguel',
            'apellido' => 'Nuñez',
            'email' => 'u3@bodegon.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('bodegas')->insert([
            'user_id' => '3',
            'nombre' => 'BODEGA LAGARDE',
            'tipo_documento' => 'RUC',
            'numero_documento' => '11111111111',
            'razon_social' => 'BODEGA LAGARDE',
            'telefono' => '111111111',
            'web' => '1.com',
            'email' => '1@gmail.com',
            'direccion' => 'Av. Las Begonias 285 - San Isidro',
        ]);

        DB::table('bodegas')->insert([
            'user_id' => '4',
            'nombre' => 'BODEGA NORTON',
            'tipo_documento' => 'RUC',
            'numero_documento' => '22222222222',
            'razon_social' => 'BODEGA NORTON',
            'telefono' => '222222222',
            'web' => '2.com',
            'email' => '2@gmail.com',
            'direccion' => 'Av. Canevaro 1085 - Lince',
        ]);

        DB::table('bodegas')->insert([
            'user_id' => '5',
            'nombre' => 'BODEGA ALTAVISTA',
            'tipo_documento' => 'RUC',
            'numero_documento' => '33333333333',
            'razon_social' => 'BODEGA ALTAVISTA',
            'telefono' => '333333333',
            'web' => '3.com',
            'email' => '3@gmail.com',
            'direccion' => 'Av. San Felipe 511 - Jesus María',
        ]);

        DB::table('categorias_productos')->insert([
            'nombre' => 'Carnes y Embutidos',
        ]);

        DB::table('categorias_productos')->insert([
            'nombre' => 'Frutas y Verduras',
        ]);

        DB::table('categorias_productos')->insert([
            'nombre' => 'Huevos y Lácteos',
        ]);

        DB::table('categorias_productos')->insert([
            'nombre' => 'Aceite, Pasta y Legumbres',
        ]);

        DB::table('unidades_medidas')->insert([
            'nombre' => 'Unidad',
        ]);

        DB::table('unidades_medidas')->insert([
            'nombre' => 'Kilos',
        ]);

        DB::table('unidades_medidas')->insert([
            'nombre' => 'Gramos',
        ]);

        DB::table('unidades_medidas')->insert([
            'nombre' => 'Litros',
        ]);

        DB::table('publicidad')->insert([
            'empresa' => 'GLORIA',
            'inicio' => '2020-09-22',
            'fin' => '2020-12-30',
            'imagen' => '20200915234448.jpg'
        ]);

        DB::table('publicidad')->insert([
            'empresa' => 'RIPLEY',
            'inicio' => '2020-09-22',
            'fin' => '2020-12-30',
            'imagen' => '20200916201804.jpg'
        ]);

        DB::table('publicidad')->insert([
            'empresa' => 'SAGA FALABELLA',
            'inicio' => '2020-09-22',
            'fin' => '2020-12-30',
            'imagen' => '20200916223222.jpg'
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '1',
            'categoria_id' => '1',
            'unidad_id' => '1',
            'codigo' => '00000001',
            'nombre' => 'Carne de res',
            'descripcion' => 'Carne de res importada',
            'precio' => '15.50',
            'imagen' => '1.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '1',
            'categoria_id' => '2',
            'unidad_id' => '1',
            'codigo' => '00000002',
            'nombre' => 'Manzana royal',
            'descripcion' => 'Manzana importada',
            'precio' => '3.40',
            'imagen' => '2.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '1',
            'categoria_id' => '4',
            'unidad_id' => '1',
            'codigo' => '00000003',
            'nombre' => 'Aceite Ideal',
            'descripcion' => 'Aceite Ideal Girasol',
            'precio' => '5.80',
            'imagen' => '3.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '2',
            'categoria_id' => '1',
            'unidad_id' => '1',
            'codigo' => '00000004',
            'nombre' => 'Pack hot dog',
            'descripcion' => 'Pack hot dog parrillero',
            'precio' => '14.30',
            'imagen' => '4.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '2',
            'categoria_id' => '2',
            'unidad_id' => '1',
            'codigo' => '00000005',
            'nombre' => 'Planano maleño',
            'descripcion' => 'Planano maleño',
            'precio' => '2.50',
            'imagen' => '5.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '2',
            'categoria_id' => '4',
            'unidad_id' => '1',
            'codigo' => '00000006',
            'nombre' => 'Fideos Don Vittorio',
            'descripcion' => 'Fideos Don Vittorio',
            'precio' => '1.99',
            'imagen' => '6.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '3',
            'categoria_id' => '1',
            'unidad_id' => '1',
            'codigo' => '00000007',
            'nombre' => 'Pack de chorizo',
            'descripcion' => 'Pack de chorizo parrillero',
            'precio' => '3.99',
            'imagen' => '7.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '3',
            'categoria_id' => '2',
            'unidad_id' => '1',
            'codigo' => '00000008',
            'nombre' => 'Naranja Tangelo',
            'descripcion' => 'Naranja Tangelo',
            'precio' => '6.49',
            'imagen' => '8.jpg',
        ]);

        DB::table('productos')->insert([
            'bodega_id' => '3',
            'categoria_id' => '4',
            'unidad_id' => '1',
            'codigo' => '00000009',
            'nombre' => 'Fideos Nicolini',
            'descripcion' => 'Fideos Nicolini',
            'precio' => '2.39',
            'imagen' => '9.jpg',
        ]);

        $role = Role::create(['name' => 'admin']);
        $user = User::where('email', 'admin@bodegon.com')->first();
        $user = $user->assignRole('admin');
    }
}
