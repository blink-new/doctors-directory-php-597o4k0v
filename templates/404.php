        <div class="error-page">
            <div class="container">
                <div class="error-content">
                    <h1 class="error-title">404</h1>
                    <h2 class="error-subtitle">Səhifə Tapılmadı</h2>
                    <p class="error-description">
                        Axtardığınız səhifə mövcud deyil və ya başqa yerə köçürülüb.
                    </p>
                    <div class="error-actions">
                        <a href="/" class="error-btn primary">Ana Səhifəyə Qayıt</a>
                        <a href="javascript:history.back()" class="error-btn secondary">Geri Qayıt</a>
                    </div>
                </div>
                
                <div class="suggested-content">
                    <h3 class="suggested-title">Populyar Kateqoriyalar</h3>
                    <div class="suggested-links">
                        <?php
                        $popular_categories = array_slice($categories, 0, 6);
                        foreach ($popular_categories as $category):
                        ?>
                        <a href="?page=category&slug=<?php echo $category['slug']; ?>" class="suggested-link">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <style>
        .error-page {
            padding: 80px 0;
            text-align: center;
            background: #f8fafc;
            min-height: 60vh;
        }
        
        .error-title {
            font-size: 120px;
            font-weight: 700;
            color: #e5e7eb;
            margin-bottom: 20px;
            line-height: 1;
        }
        
        .error-subtitle {
            font-size: 32px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 16px;
        }
        
        .error-description {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 40px;
        }
        
        .error-actions {
            display: flex;
            justify-content: center;
            gap: 16px;
            margin-bottom: 60px;
        }
        
        .error-btn {
            padding: 16px 32px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.2s;
        }
        
        .error-btn.primary {
            background: #2563eb;
            color: white;
        }
        
        .error-btn.primary:hover {
            background: #1d4ed8;
        }
        
        .error-btn.secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }
        
        .error-btn.secondary:hover {
            background: #f9fafb;
        }
        
        .suggested-content {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .suggested-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 24px;
            color: #1a1a1a;
        }
        
        .suggested-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
        }
        
        .suggested-link {
            background: white;
            color: #374151;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            border: 1px solid #e5e7eb;
            transition: all 0.2s;
        }
        
        .suggested-link:hover {
            background: #eff6ff;
            color: #2563eb;
            border-color: #2563eb;
        }
        
        @media (max-width: 768px) {
            .error-title {
                font-size: 80px;
            }
            
            .error-subtitle {
                font-size: 24px;
            }
            
            .error-actions {
                flex-direction: column;
                align-items: center;
            }
        }
        </style>