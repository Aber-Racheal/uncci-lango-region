<?php
require_once 'php/db_con.php'; // Include the database connection

// Get news article ID from URL parameter
$news_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($news_id <= 0) {
    header("Location: news&media.php");
    exit();
}

// Fetch news article details
$sql = "SELECT * FROM updates WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $news_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: news-media.php");
    exit();
}

$news = $result->fetch_assoc();

// Format the creation date
$created_date = new DateTime($news['created_at']);
$formatted_date = $created_date->format('F j, Y'); // e.g., "March 15, 2024"
$formatted_time = $created_date->format('g:i A'); // e.g., "2:30 PM"

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>news - UNCCI - Lango Region</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/UNCCI-logo.png" rel="icon" />
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" /> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link
        href="assets/vendor/bootstrap/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
        rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
        href="assets/vendor/glightbox/css/glightbox.min.css"
        rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body class="blog-details-page">

   <?php include 'includes/global-header.php'; ?>

    <main>
        <!-- Page Title -->
        <div class="page-title accent-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">News & Media</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li class="current">News & Media</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->
        <div class="container mt-5">
            <!-- Back button -->
            <div class="mb-4">
                <a href="new&media.php" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Back to News & Media
                </a>
            </div>

            <!-- News Article Details -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Image -->
                    <?php if (!empty($news['image'])): ?>
                        <div class="news-image-container mb-4">
                            <img src="<?php echo htmlspecialchars($news['image']); ?>"
                                class="img-fluid rounded"
                                alt="<?php echo htmlspecialchars($news['title']); ?>">
                        </div>
                    <?php endif; ?>

                    <!-- News Title -->
                    <h1 class="news-title mb-3"><?php echo htmlspecialchars($news['title']); ?></h1>

                    <!-- News Meta Information -->
                    <div class="news-meta mb-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-person"></i>
                                    <strong>Author:</strong> <?php echo htmlspecialchars($news['author']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-folder2"></i>
                                    <strong>Category:</strong> <?php echo htmlspecialchars($news['category']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-event"></i>
                                    <strong>Published:</strong> <?php echo $formatted_date; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="meta-item">
                                    <i class="bi bi-clock"></i>
                                    <strong>Time:</strong> <?php echo $formatted_time; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- News Content -->
                    <div class="news-content mb-4">
                        <div class="content-text">
                            <?php echo nl2br(htmlspecialchars($news['content'])); ?>
                        </div>
                    </div>

                    <!-- Social Share Section -->
                    <div class="social-share mb-4">
                        <h5>Share this article:</h5>
                        <div class="share-buttons">
                            <button class="btn btn-primary btn-sm me-2" onclick="shareOnFacebook()">
                                <i class="bi bi-facebook"></i> Facebook
                            </button>
                            <button class="btn btn-info btn-sm me-2" onclick="shareOnTwitter()">
                                <i class="bi bi-twitter"></i> Twitter
                            </button>
                            <button class="btn btn-success btn-sm me-2" onclick="shareOnWhatsApp()">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </button>
                            <button class="btn btn-secondary btn-sm" onclick="copyLink()">
                                <i class="bi bi-link-45deg"></i> Copy Link
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="news-sidebar">
                        <!-- Article Info Card -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Article Information</h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bi bi-person"></i>
                                        <strong>Author:</strong><br>
                                        <span class="text-muted"><?php echo htmlspecialchars($news['author']); ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-folder2"></i>
                                        <strong>Category:</strong><br>
                                        <span class="badge bg-primary"><?php echo htmlspecialchars($news['category']); ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-calendar-event"></i>
                                        <strong>Published Date:</strong><br>
                                        <span class="text-muted"><?php echo $formatted_date; ?></span>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-clock"></i>
                                        <strong>Published Time:</strong><br>
                                        <span class="text-muted"><?php echo $formatted_time; ?></span>
                                    </li>
                                    <li>
                                        <i class="bi bi-file-text"></i>
                                        <strong>Word Count:</strong><br>
                                        <span class="text-muted"><?php echo str_word_count($news['content']); ?> words</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Related Articles Card (placeholder for future functionality) -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Related Articles</h5>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Related articles will be displayed here.</p>
                                <a href="new&media.php" class="btn btn-outline-primary btn-sm">
                                    View All Articles
                                </a>
                            </div>
                        </div>

                        <!-- Quick Actions Card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Quick Actions</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary btn-sm" onclick="window.print()">
                                        <i class="bi bi-printer"></i> Print Article
                                    </button>
                                    <button class="btn btn-outline-success btn-sm" onclick="copyLink()">
                                        <i class="bi bi-link-45deg"></i> Copy Link
                                    </button>
                                    <a href="new&media.php" class="btn btn-outline-secondary btn-sm">
                                        <i class="bi bi-arrow-left"></i> Back to News
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="news-actions text-center">
                        <a href="new&media.php" class="btn btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Back to News & Media
                        </a>
                        <button class="btn btn-primary me-2" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print Article
                        </button>
                        <button class="btn btn-success" onclick="shareOnWhatsApp()">
                            <i class="bi bi-share"></i> Share Article
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'includes/global-footer.php'; ?>

    <!-- Add your footer here if you have one -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript for sharing functionality -->
    <script>
        // Get current page URL and article title for sharing
        const currentUrl = window.location.href;
        const articleTitle = "<?php echo addslashes($news['title']); ?>";

        function shareOnFacebook() {
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
            window.open(facebookUrl, '_blank', 'width=600,height=400');
        }

        function shareOnTwitter() {
            const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(articleTitle)}`;
            window.open(twitterUrl, '_blank', 'width=600,height=400');
        }

        function shareOnWhatsApp() {
            const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(articleTitle + ' ' + currentUrl)}`;
            window.open(whatsappUrl, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(currentUrl).then(function() {
                alert('Link copied to clipboard!');
            }, function(err) {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = currentUrl;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                alert('Link copied to clipboard!');
            });
        }

        // Print function
        function printArticle() {
            window.print();
        }
    </script>
</body>

</html>