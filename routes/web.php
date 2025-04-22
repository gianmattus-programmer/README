<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware options can be located in `app/Http/Kernel.php`
|
*/

// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    Route::get('/', 'App\Http\Controllers\WelcomeController@welcome')->name('welcome');
    Route::get('/terms', 'App\Http\Controllers\TermsController@terms')->name('terms');
});

Route::post('/carrito/add/{productId}', 'App\Http\Controllers\CartController@addToCart')->name('cart.add');
Route::get('/carrito', 'App\Http\Controllers\CartController@viewCart')->name('cart.view');
Route::post('/carrito/update/{cartId}', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');
Route::delete('/carrito/remove/{cartId}', 'App\Http\Controllers\CartController@removeCartItem')->name('cart.remove');

Route::get('/pago', 'App\Http\Controllers\PaymentController@createPayment')->name('createPayment');
Route::post('/crear-preferencia', [App\Http\Controllers\PaymentController::class, 'crearPreferencia'])->name('crear-preferencia');
Route::resource('payment', App\Http\Controllers\PaymentController::class)->names('payment');

Route::get('/payment/success', 'App\Http\Controllers\PaymentController@success')->name('payment.success');
Route::get('/payment/error', 'App\Http\Controllers\PaymentController@error')->name('payment.error');
Route::get('/payment/pending', 'App\Http\Controllers\PaymentController@pending')->name('payment.pending');

Route::get('encuentranos', 'App\Http\Controllers\WelcomeController@encuentranos')->name('encuentranos');
Route::get('nosotros', 'App\Http\Controllers\WelcomeController@nosotros')->name('nosotros');
//Route::get('carrito', 'App\Http\Controllers\WelcomeController@carrito')->name('carrito');
Route::get('finalizarcompra', 'App\Http\Controllers\WelcomeController@finalizarcompra')->name('finalizarcompra');
Route::get('terminos-y-condiciones', 'App\Http\Controllers\WelcomeController@terminos')->name('terminos');
Route::get('politicas-de-datos', 'App\Http\Controllers\WelcomeController@politicas')->name('politicas');
Route::get('libro-de-reclamaciones', 'App\Http\Controllers\WelcomeController@libros')->name('libros');
Route::get('gracias', 'App\Http\Controllers\WelcomeController@gracias')->name('gracias');

Route::get('/verificar-cupon', 'App\Http\Controllers\WelcomeController@verificarCupon')->name('verificar.cupon');

Route::resource('examen', App\Http\Controllers\ExamenController::class)->names('examen');

Route::resource('admin/libros', App\Http\Controllers\Admin\LibroController::class)->names('adminlibros');

Route::resource('/in_shopping_carts', App\Http\Controllers\InShoppingCartsController::class)->names('in_shopping_carts');
Route::resource('checkout', App\Http\Controllers\Admin\CheckoutController::class)->names('checkout');

/** Usuarios */
//Route::resource('cursos', App\Http\Controllers\CursoController::class)->names('cursos');
Route::get('/cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/{id}/{nombre}', [App\Http\Controllers\CursoController::class, 'show'])->name('cursos.show');
Route::get('/curso/{id}/{nombre}', [App\Http\Controllers\CursoController::class, 'prodshow'])->name('cursos.prodshow');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('tienda.index');
Route::get('/shops/{id}/{nombre}', [App\Http\Controllers\ShopController::class, 'show'])->name('tienda.show');
Route::get('/shop/{id}/{nombre}', [App\Http\Controllers\ShopController::class, 'prodshow'])->name('tienda.prodshow');

// Authentication Routes
Auth::routes();

// Public Routes
Route::group(['middleware' => ['web', 'activity', 'checkblocked']], function () {
    // Activation Routes
    Route::get('/activate', ['as' => 'activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@initial']);

    Route::get('/activate/{token}', ['as' => 'authenticated.activate', 'uses' => 'App\Http\Controllers\Auth\ActivateController@activate']);
    Route::get('/activation', ['as' => 'authenticated.activation-resend', 'uses' => 'App\Http\Controllers\Auth\ActivateController@resend']);
    Route::get('/exceeded', ['as' => 'exceeded', 'uses' => 'App\Http\Controllers\Auth\ActivateController@exceeded']);

    // Socialite Register Routes
    Route::get('/social/redirect/{provider}', ['as' => 'social.redirect', 'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialRedirect']);
    Route::get('/social/handle/{provider}', ['as' => 'social.handle', 'uses' => 'App\Http\Controllers\Auth\SocialController@getSocialHandle']);

    // Route to for user to reactivate their user deleted account.
    Route::get('/re-activate/{token}', ['as' => 'user.reactivate', 'uses' => 'App\Http\Controllers\RestoreUserController@userReActivate']);
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'checkblocked']], function () {
    // Activation Routes
    Route::get('/activation-required', ['uses' => 'App\Http\Controllers\Auth\ActivateController@activationRequired'])->name('activation-required');
    // Route::get('/logout', ['uses' => 'App\Http\Controllers\Auth\LoginController@logout'])->name('logout');
});

// Registered and Activated User Routes
Route::group(['middleware' => ['auth', 'activated', 'activity', 'twostep', 'checkblocked']], function () {
    //  Homepage Route - Redirect based on user role is in controller.
    Route::get('/home', [
        'as'   => 'public.home',
        'uses' => 'App\Http\Controllers\UserController@index',
        'name' => 'home',
    ]);

    // Show users profile - viewable by other users.
    Route::get('profile/{username}', [
        'as'   => '{username}',
        'uses' => 'App\Http\Controllers\ProfilesController@show',
    ]);

    /** Admin */
    Route::get('/admin/cursoslistados/precios/{id}', [App\Http\Controllers\Admin\CursoListadoController::class, 'precio'])->name('listado.precios');
    Route::resource('admin/cursoscategorias', App\Http\Controllers\Admin\CursoCategoriaController::class)->names('cursoscategorias');
    Route::resource('admin/cursoslistados', App\Http\Controllers\Admin\CursoListadoController::class)->names('cursoslistados');
    Route::resource('admin/cursostemarios', App\Http\Controllers\Admin\CursoTemarioController::class)->names('cursostemarios');

    Route::post('/admin/cursosmodulos/update-order', [App\Http\Controllers\Admin\CursoModuloController::class, 'updateOrder'])->name('cursosmodulos.updateOrder');
    Route::resource('admin/cursosmodulos', App\Http\Controllers\Admin\CursoModuloController::class)->names('cursosmodulos');

    Route::resource('admin/cursosprecios', App\Http\Controllers\Admin\CursoPrecioController::class)->names('cursosprecios');
    Route::resource('admin/cursosnotas', App\Http\Controllers\Admin\CursoNotaController::class)->names('cursosnotas');
    Route::resource('estatus', App\Http\Controllers\Admin\EstatusController::class)->names('estatus');

    Route::resource('admin/asistencias', App\Http\Controllers\Admin\AsistenciaController::class)->names('adminasistencias');
    Route::resource('admin/cupones', App\Http\Controllers\Admin\CuponController::class)->names('admincupones');

    Route::resource('admin/nosotros', App\Http\Controllers\Admin\NosotrosController::class)->names('adminnosotros');
    Route::resource('admin/encuentranos', App\Http\Controllers\Admin\EncuentranosController::class)->names('adminencuentranos');
    Route::resource('admin/encuentranos/popups', App\Http\Controllers\Admin\PopupController::class)->names('encuentranospopups');

    Route::resource('admin/profesores', App\Http\Controllers\Admin\ProfesorController::class)->names('adminprofesores');
    Route::resource('admin/politicas', App\Http\Controllers\Admin\PoliticaController::class)->names('adminpoliticas');
    Route::resource('admin/terminos', App\Http\Controllers\Admin\TerminoController::class)->names('adminterminos');
    Route::resource('admin/shop', App\Http\Controllers\Admin\ShopController::class)->names('adminshops');
    /** Curso pagados */
    Route::get('/curso/temario', [App\Http\Controllers\CursoController::class, 'temario'])->name('cursos.temario');

    /** Cursos pagados */
    Route::get('/pagados', [App\Http\Controllers\PagadoController::class, 'index'])->name('pagados.index');
    Route::get('/pagados/{id}/{nombre}', [App\Http\Controllers\PagadoController::class, 'show'])->name('pagados.show');
    Route::get('/pagado/{id}/{nombre}', [App\Http\Controllers\PagadoController::class, 'prodshow'])->name('pagados.prodshow');
    
    /** Tienda admin */
    Route::resource('admin/tiendacategorias', App\Http\Controllers\Admin\TiendaCategoriaController::class)->names('tiendacategorias');
    Route::resource('admin/tiendalistados', App\Http\Controllers\Admin\TiendaListadoController::class)->names('tiendalistados');
});

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth', 'activated', 'currentUser', 'activity', 'twostep', 'checkblocked']], function () {
    // User Profile and Account Routes
    Route::resource(
        'profile',
        \App\Http\Controllers\ProfilesController::class,
        [
            'only' => [
                'show',
                'edit',
                'update',
                'create',
            ],
        ]
    );
    Route::put('profile/{username}/updateUserAccount', [
        'as'   => 'profile.updateUserAccount',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserAccount',
    ]);
    Route::put('profile/{username}/updateUserPassword', [
        'as'   => 'profile.updateUserPassword',
        'uses' => 'App\Http\Controllers\ProfilesController@updateUserPassword',
    ]);
    Route::delete('profile/{username}/deleteUserAccount', [
        'as'   => 'profile.deleteUserAccount',
        'uses' => 'App\Http\Controllers\ProfilesController@deleteUserAccount',
    ]);

    // Route to show user avatar
    Route::get('images/profile/{id}/avatar/{image}', [
        'uses' => 'App\Http\Controllers\ProfilesController@userProfileAvatar',
    ]);

    // Route to upload user avatar.
    Route::post('avatar/upload', ['as' => 'avatar.upload', 'uses' => 'App\Http\Controllers\ProfilesController@upload']);
});

// Registered, activated, and is admin routes.
Route::group(['middleware' => ['auth', 'activated', 'role:admin', 'activity', 'twostep', 'checkblocked']], function () {
    Route::resource('/users/deleted', \App\Http\Controllers\SoftDeletesController::class, [
        'only' => [
            'index', 'show', 'update', 'destroy',
        ],
    ]);

    Route::resource('users', \App\Http\Controllers\UsersManagementController::class, [
        'names' => [
            'index'   => 'users',
            'destroy' => 'user.destroy',
        ],
        'except' => [
            'deleted',
        ],
    ]);
    Route::post('search-users', 'App\Http\Controllers\UsersManagementController@search')->name('search-users');

    Route::resource('themes', \App\Http\Controllers\ThemesManagementController::class, [
        'names' => [
            'index'   => 'themes',
            'destroy' => 'themes.destroy',
        ],
    ]);

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('routes', 'App\Http\Controllers\AdminDetailsController@listRoutes');
    // Route::get('active-users', 'App\Http\Controllers\AdminDetailsController@activeUsers');
});

Route::redirect('/php', '/phpinfo', 301);
