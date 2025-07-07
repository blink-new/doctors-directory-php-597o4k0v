<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'Azərbaycan Həkimləri Kataloqu'; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'Azərbaycanda ən yaxşı həkimləri tapın'; ?>">
    <meta name="keywords" content="<?php echo isset($page_keywords) ? $page_keywords : 'həkim, doktor, Azərbaycan, tibbi xidmət'; ?>">
    <meta name="author" content="<?php echo isset($page_author) ? $page_author : 'Həkimləri Tapın'; ?>">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo isset($page_title) ? $page_title : 'Azərbaycan Həkimləri Kataloqu'; ?>">
    <meta property="og:description" content="<?php echo isset($page_og_description) ? $page_og_description : (isset($page_description) ? $page_description : 'Azərbaycanda ən yaxşı həkimləri tapın'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:site_name" content="Həkimləri Tapın">
    <meta property="og:image" content="<?php echo isset($page_og_image) && $page_og_image ? $page_og_image : 'assets/default-og-image.jpg'; ?>">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($page_title) ? $page_title : 'Azərbaycan Həkimləri Kataloqu'; ?>">
    <meta name="twitter:description" content="<?php echo isset($page_og_description) ? $page_og_description : (isset($page_description) ? $page_description : 'Azərbaycanda ən yaxşı həkimləri tapın'); ?>">
    <meta name="twitter:image" content="<?php echo isset($page_og_image) && $page_og_image ? $page_og_image : 'assets/default-og-image.jpg'; ?>">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- JSON-LD Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Həkimləri Tapın",
        "url": "<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>",
        "description": "Azərbaycanda ən yaxşı həkimləri tapın",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo 'http://' . $_SERVER['HTTP_HOST']; ?>/?search={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="/" class="logo-link">
                        <h1 class="logo-text">Həkimləri Tapın</h1>
                        <span class="logo-subtitle">Azərbaycan Həkimləri Kataloqu</span>
                    </a>
                </div>
                
                <nav class="main-nav">
                    <div class="nav-links">
                        <a href="/" class="nav-link">Ana Səhifə</a>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle">Kateqoriyalar</a>
                            <div class="dropdown-menu">
                                <?php foreach ($categories as $category): ?>
                                <a href="?page=category&slug=<?php echo $category['slug']; ?>" class="dropdown-item">
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle">Bölgələr</a>
                            <div class="dropdown-menu">
                                <?php foreach ($regions as $region): ?>
                                <a href="?page=region&slug=<?php echo $region['slug']; ?>" class="dropdown-item">
                                    <?php echo htmlspecialchars($region['address']); ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <div class="header-actions">
                    <form class="search-form" action="/" method="GET">
                        <input type="text" name="search" placeholder="Həkim adı, ixtisas axtarın..." 
                               value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                               class="search-input">
                        <button type="submit" class="search-btn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.514 16.506M19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>
                </div>
                
                <div class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    
    <main class="main-content"><?php echo "\n"; ?>
</body>
</html>