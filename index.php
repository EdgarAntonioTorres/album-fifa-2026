<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIFA 2026 - Edición México</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --mex-green: #006341;
            --mex-red: #ce1126;
            --mex-white: #ffffff;
            --mex-gold: #b38e5d;
            --bg-light: #f4f4f4;
            --text-dark: #1a1a1a;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background-color: var(--bg-light);
            /* Patrón sutil de fondo */
            background-image: radial-gradient(var(--mex-green) 0.5px, transparent 0.5px);
            background-size: 30px 30px;
            background-color: #e9ecef;
        }

        .bebas {
            font-family: 'Bebas Neue', cursive;
            letter-spacing: 1px;
        }

        /* --- Header Estilo Pasta Dura --- */
        .navbar {
            background: linear-gradient(135deg, var(--mex-green) 0%, #00422c 100%);
            border-bottom: 5px solid var(--mex-red);
            padding: 1.5rem 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: var(--mex-white) !important;
            text-shadow: 2px 2px 0px var(--mex-red);
        }

        /* --- Stats Dashboard --- */
        .stat-card {
            background: var(--mex-white);
            border: none;
            border-left: 5px solid var(--mex-green);
            border-radius: 8px;
            padding: 1.25rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .stat-card.stat-faltan {
            border-left-color: var(--mex-red);
        }

        .stat-card.stat-reps {
            border-left-color: var(--mex-gold);
        }

        .stat-value {
            font-size: 2.2rem;
            line-height: 1;
            margin-bottom: 5px;
            color: var(--mex-green);
        }

        .stat-faltan .stat-value {
            color: var(--mex-red);
        }

        /* --- Tabs & Search --- */
        .nav-pills .nav-link {
            color: var(--mex-green);
            background: var(--mex-white);
            border: 2px solid var(--mex-green);
            margin-right: 8px;
            font-weight: 700;
        }

        .nav-pills .nav-link.active {
            background-color: var(--mex-green);
            color: var(--mex-white);
            border-color: var(--mex-green);
        }

        .form-control-mex {
            border: 2px solid var(--mex-green);
            border-radius: 8px;
        }

        .form-control-mex:focus {
            border-color: var(--mex-red);
            box-shadow: 0 0 0 0.25rem rgba(206, 17, 38, 0.25);
        }

        /* --- Tarjetas de Países --- */
        .country-card {
            background: var(--mex-white);
            border: 1px solid #ddd;
            border-bottom: 4px solid var(--mex-green);
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s;
        }

        .country-card:hover {
            transform: scale(1.03);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-badge {
            background: var(--mex-red);
            color: white;
            font-weight: bold;
            padding: 4px 10px;
            border-radius: 4px;
        }

        .progress {
            background-color: #eee;
            height: 10px;
            border-radius: 10px;
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--mex-green), #28a745);
        }

        /* --- Estampas (Stickers) --- */
        .stamp-item {
            aspect-ratio: 1;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            font-weight: bold;
            position: relative;
            cursor: pointer;
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.05);
        }

        /* Efecto pegado (Owned) */
        .stamp-item.owned {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px solid var(--mex-green);
            color: var(--mex-green);
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.1);
        }

        /* Efecto repetida */
        .stamp-item.repeat {
            border-color: var(--mex-gold);
            background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%);
        }

        .repeat-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--mex-red);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 50%;
            border: 2px solid white;
        }

        /* --- Modal --- */
        .modal-content {
            border-radius: 15px;
            border: none;
        }

        .modal-header {
            background-color: var(--mex-green);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        /* Estilos para la lista de repetidas */
        .rep-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-left: 5px solid var(--mex-gold);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .rep-badge-info {
            background: var(--mex-green);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            min-width: 80px;
            text-align: center;
        }

        .rep-count {
            background: var(--mex-red);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-left: auto;
        }
    </style>
</head>

<body>

    <nav class="navbar mb-5">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="navbar-brand m-0 bebas fs-1">⚽ ÁLBUM FIFA 2026</div>
            <div class="d-none d-md-block">
                <span class="badge bg-white text-dark me-2">EDICIÓN DE COLECCIONISTA</span>
                <span class="badge bg-danger text-white">MÉXICO</span>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row g-3 mb-5">
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-value bebas" id="stat-tengo">0</div>
                    <div class="small fw-bold">TENGO</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-faltan">
                    <div class="stat-value bebas" id="stat-faltan">0</div>
                    <div class="small fw-bold">FALTAN</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card stat-reps">
                    <div class="stat-value bebas" id="stat-reps" style="color: var(--mex-gold)">0</div>
                    <div class="small fw-bold">REPETIDAS</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-card">
                    <div class="stat-value bebas" id="stat-pct">0%</div>
                    <div class="small fw-bold">COMPLETADO</div>
                </div>
            </div>
        </div>

        <div class="row mb-4 align-items-center">
            <div class="col-md-7 mb-3 mb-md-0">
                <ul class="nav nav-pills" id="pills-tab">
                    <li class="nav-item">
                        <button class="nav-link active" onclick="changeTab('especial', this)">ESPECIALES</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="changeTab('seleccion', this)">SELECCIONES</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="changeTab('repetidas', this)">REPETIDAS</button>
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <input type="text" id="searchInput" class="form-control form-control-mex"
                    placeholder="Buscar país (ej. México, Brasil...)" oninput="renderSections()">
            </div>
        </div>

        <div class="row g-4 mb-5" id="sectionsGrid"></div>

    </div>

    <div class="modal fade" id="sectionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h2 class="bebas m-0" id="modalTitle">Título</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row row-cols-4 row-cols-sm-6 row-cols-md-8 g-3" id="stampsGrid"></div>
                    <div class="mt-4 p-3 bg-light rounded text-center small text-muted border">
                        🟢 Click Izquierdo: <b>Pegar</b> | 🔴 Click Derecho: <b>Despegar</b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const API = 'api.php';
        let sections = [];
        let currentType = 'especial';
        const modal = new bootstrap.Modal(document.getElementById('sectionModal'));

        async function init() {
            const res = await fetch(`${API}?action=resumen`);
            const data = await res.json();
            sections = data.secciones;
            updateGlobal(data.totales);
            renderSections();
        }

        function updateGlobal(t) {
            document.getElementById('stat-tengo').innerText = t.tengo;
            document.getElementById('stat-faltan').innerText = t.faltan;
            document.getElementById('stat-reps').innerText = t.repetidas;
            document.getElementById('stat-pct').innerText = t.pct + '%';
        }

        function changeTab(type, btn) {
            currentType = type;
            document.querySelectorAll('.nav-link').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Si la pestaña es repetidas, ocultamos el buscador y llamamos a su función
            if (type === 'repetidas') {
                document.getElementById('searchInput').parentElement.style.visibility = 'hidden';
                renderRepetidas();
            } else {
                document.getElementById('searchInput').parentElement.style.visibility = 'visible';
                renderSections();
            }
        }

        async function renderRepetidas() {
            const grid = document.getElementById('sectionsGrid');
            grid.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-success"></div><p class="mt-2">Buscando tus repetidas...</p></div>';

            try {
                const res = await fetch(`${API}?action=repetidas`);
                const data = await res.json();

                grid.innerHTML = '';

                if (data.repetidas.length === 0) {
                    grid.innerHTML = `
                <div class="col-12 text-center py-5">
                    <h3 class="bebas text-muted">¡No tienes repetidas aún!</h3>
                    <p>Sigue pegando estampas para ver tus duplicados aquí.</p>
                </div>`;
                    return;
                }

                data.repetidas.forEach(r => {
                    const displayNum = r.numero === 0 ? '00' : r.numero;
                    const item = `
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="rep-item">
                        <div class="rep-badge-info bebas">${r.simbolo}</div>
                        <div>
                            <div class="fw-bold">${r.nombre}</div>
                            <div class="small text-muted">Estampa #${displayNum}</div>
                        </div>
                        <div class="rep-count" title="Tienes ${r.repetidas} extra">
                            ${r.repetidas}
                        </div>
                    </div>
                </div>
            `;
                    grid.insertAdjacentHTML('beforeend', item);
                });
            } catch (error) {
                grid.innerHTML = '<div class="col-12 text-center text-danger">Error al cargar repetidas.</div>';
            }
        }

        function renderSections() {
            const query = document.getElementById('searchInput').value.toLowerCase();
            const grid = document.getElementById('sectionsGrid');
            grid.innerHTML = '';

            // Ahora filtramos por nombre O por símbolo (MEX, RSA, FWC, etc.)
            const filtered = sections.filter(s =>
                s.tipo === currentType && (
                    s.nombre.toLowerCase().includes(query) ||
                    s.simbolo.toLowerCase().includes(query)
                )
            );

            filtered.forEach(s => {
                const card = `
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="country-card p-3" onclick="openSection('${s.nombre}')">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h4 class="bebas mb-0">${s.nombre}</h4>
                            <span class="card-badge bebas small">${s.simbolo}</span>
                        </div>
                        <div class="progress mb-2">
                            <div class="progress-bar" style="width: ${s.pct}%"></div>
                        </div>
                        <div class="d-flex justify-content-between small fw-bold">
                            <span>${s.tengo}/${s.total_estampas}</span>
                            <span class="text-success">${s.pct}%</span>
                        </div>
                    </div>
                </div>
            `;
                grid.insertAdjacentHTML('beforeend', card);
            });
        }

        async function openSection(name) {
            const res = await fetch(`${API}?action=estampas_by_nombre&nombre=${encodeURIComponent(name)}`);
            const data = await res.json();

            document.getElementById('modalTitle').innerText = data.seccion.nombre;
            const grid = document.getElementById('stampsGrid');
            grid.innerHTML = '';

            data.estampas.forEach(e => {
                const displayNum = e.numero === 0 ? '00' : e.numero;
                const stamp = `
                <div class="col">
                    <div class="stamp-item ${e.tengo > 0 ? 'owned' : ''} ${e.tengo > 1 ? 'repeat' : ''}" 
                         onclick="updateStamp(${data.seccion.id}, ${e.numero}, ${e.tengo + 1}, '${name}')"
                         oncontextmenu="event.preventDefault(); if(${e.tengo} > 0) updateStamp(${data.seccion.id}, ${e.numero}, ${e.tengo - 1}, '${name}')">
                        <span class="bebas">${displayNum}</span>
                        ${e.tengo > 1 ? `<span class="repeat-badge bebas">${e.tengo - 1}</span>` : ''}
                    </div>
                </div>
            `;
                grid.insertAdjacentHTML('beforeend', stamp);
            });

            modal.show();
        }

        async function updateStamp(sid, num, qty, name) {
            const fd = new FormData();
            fd.append('seccion_id', sid);
            fd.append('numero', num);
            fd.append('tengo', qty);

            await fetch(`${API}?action=actualizar`, { method: 'POST', body: fd });

            // Refresco silencioso
            const upRes = await fetch(`${API}?action=resumen`);
            const upData = await upRes.json();
            sections = upData.secciones;
            updateGlobal(upData.totales);
            renderSections();
            openSection(name);
        }

        init();
    </script>

</body>

</html>