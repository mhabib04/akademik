<?php
include_once 'konten.php';
include_once 'berita.php';

class BerandaController
{
    private $model, $view;
    public function __construct()
    {
        $this->model = new KontenModel();
        $this->view = new BerandaView();
    }
    public function index()
    {
        $content = $this->model->findPublishedContent();
        $this->view->index($content);
    }

    public function show($id)
    {
        $content = $this->model->find($id);
        $this->view->show($content);
    }
    
}

class BerandaModel
{
}

class BerandaView
{
    public function index($content)
    {
?>
        <div class="pmd-card pmd-z-depth">
            <div class="pmd-card-title">
                <h2 class="pmd-card-title-text typo-fill-secondary">Dashboard</h2>
            </div>
            <div class="pmd-card-body">
                <div class="row">
                    <?php foreach ($content as $item) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="berita?id=<?php echo $item->id; ?>">
                                    <!-- Tautan ke berita.php dengan menyertakan ID konten -->
                                    <img src="<?php echo $item->foto; ?>" class="card-img-top" alt="..." width="200" height="200">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item->judul; ?></h5>
                                    <p class="card-text"><?php echo $item->kategori; ?></p>
                                    <p class="card-text"><?php echo $item->tanggal; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
<?php
    }

    public function show($content)
    {
        if ($content->id != 0) {
?>
            <div class="pmd-card pmd-z-depth">
                <div class="pmd-card-title">
                    <h2 class="pmd-card-title-text typo-fill-secondary"><?php echo $content->judul; ?></h2>
                </div>
                <div class="pmd-card-body">
                    <p>Kategori: <?php echo $content->kategori; ?></p>
                    <p>Tanggal: <?php echo $content->tanggal; ?></p>
                    <img src="<?php echo $content->foto; ?>" alt="Foto Konten" width="200" height="200">
                    <p><?php echo $content->isi; ?></p>
                </div>
            </div>
<?php
        } else {
            echo "Konten tidak ditemukan.";
        }
    }
}
?>