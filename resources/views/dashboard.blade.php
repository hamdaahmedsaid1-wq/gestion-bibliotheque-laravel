<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Bibliothèque</title>

    <style>
        body{
            margin:0;
            padding:30px;
            font-family:Arial;
            background:#f4f7fb;
        }

        .navbar{
            display:flex;
            gap:20px;
            margin-bottom:30px;
            background:#2563eb;
            padding:15px 20px;
            border-radius:15px;
        }

        .navbar a{
            color:white;
            text-decoration:none;
            font-weight:bold;
        }

        h1{
            margin-bottom:30px;
        }

        .stats{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
        }

        .card, .chart-card{
            background:white;
            padding:25px;
            border-radius:20px;
            box-shadow:0 4px 12px rgba(0,0,0,0.08);
        }

        .card h3{
            color:#666;
        }

        .card p{
            font-size:40px;
            color:#2563eb;
            font-weight:bold;
        }

        .chart-card{
            margin-top:30px;
            max-width:500px;
        }
    </style>
</head>

<body>

<div class="navbar">
    <a href="/livres">📚 Livres</a>
    <a href="/emprunteurs">👤 Emprunteurs</a>
    <a href="/emprunts">🔁 Emprunts</a>
   

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" style="background:none;border:none;color:white;font-weight:bold;cursor:pointer;font-size:16px;">
            🚪 Déconnexion
        </button>
    </form>
</div>

<h1>Dashboard Bibliothèque</h1>

<div class="stats">
    <div class="card">
        <h3>Total livres</h3>
        <p>{{ $totalLivres }}</p>
    </div>

    <div class="card">
        <h3>Total quantité</h3>
        <p>{{ $totalQuantite }}</p>
    </div>

    <div class="card">
        <h3>Emprunteurs</h3>
        <p>{{ $totalEmprunteurs }}</p>
    </div>

    <div class="card">
        <h3>Total emprunts</h3>
        <p>{{ $totalEmprunts }}</p>
    </div>

    <div class="card">
        <h3>Emprunts en cours</h3>
        <p>{{ $empruntsEnCours }}</p>
    </div>

    <div class="card">
        <h3>Livres retournés</h3>
        <p>{{ $empruntsRetournes }}</p>
    </div>
</div>

<div class="chart-card">
    <h3>Statistiques des emprunts</h3>
    <canvas id="empruntsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('empruntsChart');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['En cours', 'Retournés'],
            datasets: [{
                data: [{{ $empruntsEnCours }}, {{ $empruntsRetournes }}],
                backgroundColor: ['#f59e0b', '#22c55e']
            }]
        }
    });
</script>
<script>
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }

    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }
</script>
</body>
</html>