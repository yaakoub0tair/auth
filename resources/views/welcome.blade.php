<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odin - Gestionnaire de Liens</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Odin</h1>
                <p class="text-gray-600 mb-8">Gestionnaire de liens personnel</p>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Bienvenue</h2>
                    
                    <div class="space-y-4">
                        <a href="{{ route('login') }}" 
                           class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-800 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Se connecter
                        </a>
                        
                        <a href="{{ route('register') }}" 
                           class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Créer un compte
                        </a>
                    </div>
                    
                    <div class="mt-8 text-center">
                        <p class="text-sm text-gray-500">
                            Organisez vos liens par catégories et tags
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
