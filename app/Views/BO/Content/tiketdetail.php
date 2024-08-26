<style>
    .tracking-detail {
        padding: 3rem 0;
    }

    #tracking {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    [class*="tracking-status-"] p {
        margin: 0;
        font-size: 1.1rem;
        color: #fff;
        text-transform: uppercase;
        text-align: center;
    }

    [class*="tracking-status-"] {
        padding: 1.6rem 0;
    }

    .tracking-list {
        border: 1px solid #e5e5e5;
    }

    .tracking-item {
        border-left: 4px solid #00ba0d;
        position: relative;
        padding: 2rem 1.5rem 0.5rem 2.5rem;
        font-size: 0.9rem;
        margin-left: 3rem;
        min-height: 5rem;
    }

    .tracking-item:last-child {
        padding-bottom: 4rem;
    }

    .tracking-item .tracking-date {
        margin-bottom: 0.5rem;
    }

    .tracking-item .tracking-date span {
        color: #888;
        font-size: 85%;
        padding-left: 0.4rem;
    }

    .tracking-item .tracking-content {
        padding: 0.5rem 0.8rem;
        background-color: #f4f4f4;
        border-radius: 0.5rem;
    }

    .tracking-item .tracking-content span {
        display: block;
        color: #767676;
        font-size: 13px;
    }

    .tracking-item .tracking-icon {
        position: absolute;
        left: -0.7rem;
        width: 1.1rem;
        height: 1.1rem;
        text-align: center;
        border-radius: 50%;
        font-size: 1.1rem;
        background-color: #fff;
        color: #fff;
    }

    .tracking-item-pending {
        border-left: 4px solid #d6d6d6;
        position: relative;
        padding: 2rem 1.5rem 0.5rem 2.5rem;
        font-size: 0.9rem;
        margin-left: 3rem;
        min-height: 5rem;
    }

    .tracking-item-pending:last-child {
        padding-bottom: 4rem;
    }

    .tracking-item-pending .tracking-date {
        margin-bottom: 0.5rem;
    }

    .tracking-item-pending .tracking-date span {
        color: #888;
        font-size: 85%;
        padding-left: 0.4rem;
    }

    .tracking-item-pending .tracking-content {
        padding: 0.5rem 0.8rem;
        background-color: #f4f4f4;
        border-radius: 0.5rem;
    }

    .tracking-item-pending .tracking-content span {
        display: block;
        color: #767676;
        font-size: 13px;
    }

    .tracking-item-pending .tracking-icon {
        line-height: 2.6rem;
        position: absolute;
        left: -0.7rem;
        width: 1.1rem;
        height: 1.1rem;
        text-align: center;
        border-radius: 50%;
        font-size: 1.1rem;
        color: #d6d6d6;
    }

    .tracking-item-pending .tracking-content {
        font-weight: 600;
        font-size: 17px;
    }

    .tracking-item .tracking-icon.status-current {
        width: 1.9rem;
        height: 1.9rem;
        left: -1.1rem;
    }

    .tracking-item .tracking-icon.status-intransit {
        color: #00ba0d;
        font-size: 0.6rem;
    }

    .tracking-item .tracking-icon.status-current {
        color: #ba0003;
        font-size: 0.6rem;
    }

    @media (min-width: 992px) {
        .tracking-item {
            margin-left: 10rem;
        }

        .tracking-item .tracking-date {
            position: absolute;
            left: -10rem;
            width: 7.5rem;
            text-align: right;
        }

        .tracking-item .tracking-date span {
            display: block;
        }

        .tracking-item .tracking-content {
            padding: 0;
            background-color: transparent;
        }

        .tracking-item-pending {
            margin-left: 10rem;
        }

        .tracking-item-pending .tracking-date {
            position: absolute;
            left: -10rem;
            width: 7.5rem;
            text-align: right;
        }

        .tracking-item-pending .tracking-date span {
            display: block;
        }

        .tracking-item-pending .tracking-content {
            padding: 0;
            background-color: transparent;
        }
    }

    .tracking-item .tracking-content {
        font-weight: 600;
        font-size: 17px;
    }

    .blinker {
        border: 7px solid #f5c1c2;
        animation: blink 1s;
        animation-iteration-count: infinite;
    }

    @keyframes blink {
        50% {
            border-color: #fff;
        }
    }
</style>
<!-- Content Header (Page header) -->


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Project Detail</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Project Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Projects Detail</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 order-2 order-md-1">
                    <div id="confirmButton" class="text-center mb-3">

                    </div>
                    <div id="tracking-pre">
                        <p>History Tiket</p>
                    </div>
                    <div id="tracking">
                        <div class="tracking-list">
                            <!-- Content for left column -->
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-8 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> AdminLTE v3</h3>
                    <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu
                        stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.
                    </p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Client Company
                            <b class="d-block">Deveint Inc</b>
                        </p>
                        <p class="text-sm">Project Leader
                            <b class="d-block">Tony Chicken</b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Project files</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                Functional-requirements.docx</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i>
                                Email-from-flatbal.mln</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>
                                Contract-10_12_2014.docx</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->