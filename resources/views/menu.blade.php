<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Revistas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
        }
        .menu-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .menu-card {
            text-align: center;
        }
        .menu-card h1 {
            color: white;
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 50px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .menu-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            min-height: 180px;
        }
        .menu-btn i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .menu-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }
        .btn-revistas {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        .btn-autores {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        .btn-articulos {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }
        .btn-usuarios {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark">
        <div class="container-fluid">
            <span class="navbar-brand">
                <i class="bi bi-book"></i> Gestión de Revistas
            </span>
            <div>
                <span class="text-white me-3">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </nav>

    <div class="menu-container">
        <div class="menu-card">
            <h1><i class="bi bi-lightning-fill"></i> Menú Principal</h1>
            
            <div class="menu-grid">
                <a href="/revista" class="menu-btn btn-revistas">
                    <i class="bi bi-journal"></i>
                    Revistas
                </a>

                <a href="/autor" class="menu-btn btn-autores">
                    <i class="bi bi-person-circle"></i>
                    Autores
                </a>

                <a href="/articulo" class="menu-btn btn-articulos">
                    <i class="bi bi-file-text"></i>
                    Artículos
                </a>
            @if(Auth::user()->isAdmin())
                <a href="{{ route('usuarios.index') }}" class="menu-btn btn-usuarios">
                    <i class="bi bi-people"></i>
                    Usuarios
                </a>
            @endif
            @if(Auth::user()->rol == 'autor')
                    <a href="/mis-articulos" class="menu-btn btn-articulos">
                    <i class="bi bi-journal-text"></i>
                    Mis Artículos
                </a>
            @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>