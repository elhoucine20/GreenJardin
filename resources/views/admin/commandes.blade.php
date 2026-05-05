@extends('layout.admin')
@section('title-and-style')

<title>Gestion des Commandes - Jardin Naturel</title>
<link rel="stylesheet" href="{{asset('css/commandes.css')}}">
@endsection

@section('main-content')
<!-- Sidebar -->
<!-- <x-sidebar /> -->

<!-- Main Content -->
<main class="main-content">
    @if(session('success'))
    <div class="alert alert-success" style="color: green; padding:10px;">
        <h3> {{ session('success') }} ✅</h3>

    </div>
    @endif

    @if(session('deleted'))
    <div class="alert alert-danger" style="color:red; padding:10px;">
        <h3>{{ session('deleted') }} 🚫</h3>
        
    </div>
@endif
    <!-- Page Header -->
    <div class="page-header">


        <div class="header-left">
            <h2 class="page-title">Gestion des Commandes</h2>
            <p class="page-subtitle">Suivez et gérez toutes vos commandes en temps réel</p>
        </div>
        <!-- <button class="btn-primary" onclick="exportOrders()">
            <span class="btn-icon">📥</span>
            Exporter
        </button> -->
    </div>

    <!-- Stats Summary -->
    <div class="stats-summary">
        <div class="stat-card">
            <div class="stat-icon pending">⏳</div>
            <div class="stat-content">
                <span class="stat-value" id="pendingCount">{{$countPendding}}</span>
                <span class="stat-label">En attente</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon paid">💰</div>
            <div class="stat-content">
                <span class="stat-value" id="paidCount">{{$countPaye}}</span>
                <span class="stat-label">Payées</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon cancelled">❌</div>
            <div class="stat-content">
                <span class="stat-value" id="cancelledCount">{{$countAnnuler}}</span>
                <span class="stat-label">Annulées</span>
            </div>
        </div>
    </div>
    <!-- Orders Grid -->
    <div class="orders-grid" id="ordersGrid">
        <!-- Order Card 1 -->

        @foreach($paimentes as $paiment)
        <div class="order-card" data-id="1" data-status="pending" data-date="2026-02-08">
            <div class="card-header">
                <div class="order-number">#CMD-2026-00{{$paiment->id}}</div>
                @if($paiment->status=='en_attente')
                <span class="status-badge pending">{{$paiment->status}}</span>
                @elseif($paiment->status=='paye')
                <span class="status-badge paid">{{$paiment->status}}</span>
                @elseif($paiment->status=='annuler')
                <span class="status-badge cancelled">{{$paiment->status}}</span>
                @endif
            </div>
            <div class="card-body">
                <div class="customer-info">
                    <div class="customer-avatar">PD</div>
                    <div class="customer-details">
                        <span class="customer-name">{{$paiment->commande->user->name}}</span>
                        <span class="customer-email">{{$paiment->commande->user->email}}</span>
                    </div>
                </div>
                <div class="order-meta">
                    <div class="meta-item">
                        <span class="meta-label">📅 Date</span>
                        <span class="meta-value">{{$paiment->created_at}}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">💳 Paiement</span>
                        <span class="meta-value">{{$paiment->methode}}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">📦 Articles</span>
                        <span class="meta-value">{{$paiment->commande->quantity}} produits</span>
                    </div>
                </div>
                <div class="order-amount">
                    <span class="amount-label">Montant total</span>
                    <span class="amount-value">{{$paiment->commande->total}}$</span>
                </div>
            </div>
            <div class="card-actions">
                <button class="btn-status" data-id="{{$paiment->id}}" onclick="changeStatus(this.dataset.id,'{{ $paiment->status }}')">
                    <span class="btn-icon">🔄</span>
                    Statut
                </button>
                <form action="{{ route('commandesAdmin.destroy', $paiment->id) }}" method="POST" onsubmit="return confirm()">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn-cancel">
                       Delete<span class="btn-icon">🗑️</span>
                    </button>
                </form>
            </div>
        </div>

        @endforeach
        <!-- Change Status Modal -->
        <div class="modal-overlay" id="statusModal">
            <div class="modal-container">
                <div class="modal-header">
                    <h3 class="modal-title">Changer le statut</h3>
                    <button class="modal-close" onclick="closeStatusModal()">✕</button>
                </div>

                <form action="{{route('commandesAdmin.update',0)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="statusOrderId">
                        <div class="form-group">
                            <label>Nouveau statut</label>
                            <select id="newStatus" name="status" class="form-select">
                                <option value="en_attente">En attente</option>
                                <option value="paye">Payée</option>
                                <option value="annuler">Annulée</option>
                            </select>
                        </div>
                        <div class="modal-actions">
                            <button type="button" class="btn-secondary" onclick="closeStatusModal()">Annuler</button>
                            <button type="submit"  class="btn-primary">Confirmer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{ $paimentes->links() }}
</main>


<script>
    function changeStatus(id,currentStatus) {
        document.getElementById('statusOrderId').value = id;
            document.getElementById('newStatus').value = currentStatus;

        document.getElementById('statusModal').classList.add('show');
    }

    function closeStatusModal() {
        currentOrderId = null;
        document.getElementById('statusModal').classList.remove('show');
    }

</script>

@endsection