        <div class="category-page">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" class="breadcrumb-link">Ana Səhifə</a>
                    <span class="breadcrumb-separator">/</span>
                    <span class="breadcrumb-current"><?php echo htmlspecialchars($category_info['name']); ?> Həkimləri</span>
                </div>
                
                <div class="page-header">
                    <h1 class="page-title"><?php echo htmlspecialchars($category_info['name']); ?> Həkimləri</h1>
                    <p class="page-description">
                        <?php echo htmlspecialchars($category_info['name']); ?> sahəsində ən yaxşı həkimləri tapın. 
                        Təcrübəli həkimlərimizlə əlaqə saxlayın.
                    </p>
                    
                    <div class="results-count">
                        <span class="count-number"><?php echo count($category_doctors); ?></span> həkim tapıldı
                    </div>
                </div>
                
                <div class="filters-section">
                    <form class="filters-form" action="" method="GET">
                        <input type="hidden" name="page" value="category">
                        <input type="hidden" name="slug" value="<?php echo htmlspecialchars($category_info['slug']); ?>">
                        
                        <div class="filter-group">
                            <label for="region-filter" class="filter-label">Bölgə:</label>
                            <select name="region" id="region-filter" class="filter-select">
                                <option value="">Bütün bölgələr</option>
                                <?php foreach ($regions as $region): ?>
                                <option value="<?php echo $region['id']; ?>" 
                                        <?php echo (isset($_GET['region']) && $_GET['region'] == $region['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($region['address']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="filter-group">
                            <label for="workplace-filter" class="filter-label">Xəstəxana:</label>
                            <select name="workplace" id="workplace-filter" class="filter-select">
                                <option value="">Bütün xəstəxanalar</option>
                                <?php foreach ($workplaces as $workplace): ?>
                                <option value="<?php echo $workplace['id']; ?>" 
                                        <?php echo (isset($_GET['workplace']) && $_GET['workplace'] == $workplace['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($workplace['name']); ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="filter-btn">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21L16.514 16.506M19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Filtrələ
                        </button>
                    </form>
                </div>
                
                <?php if (count($category_doctors) > 0): ?>
                <div class="doctors-list">
                    <?php foreach ($category_doctors as $doctor): ?>
                    <div class="doctor-list-item">
                        <div class="doctor-image">
                            <?php if ($doctor['image']): ?>
                            <img src="<?php echo htmlspecialchars($doctor['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>">
                            <?php else: ?>
                            <div class="doctor-image-placeholder">
                                <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                    <path d="M12 14C7.58172 14 4 17.5817 4 22H20C20 17.5817 16.4183 14 12 14Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="doctor-info">
                            <h3 class="doctor-name">
                                <a href="?page=doctor&id=<?php echo $doctor['id']; ?>" class="doctor-link">
                                    <?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>
                                </a>
                            </h3>
                            
                            <div class="doctor-meta">
                                <span class="doctor-category"><?php echo htmlspecialchars($doctor['category_name']); ?></span>
                                <span class="doctor-workplace"><?php echo htmlspecialchars($doctor['workplace_name']); ?></span>
                            </div>
                            
                            <div class="doctor-location">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.3639 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <?php echo htmlspecialchars($doctor['region_address']); ?>
                            </div>
                            
                            <div class="doctor-about">
                                <p><?php echo substr(htmlspecialchars($doctor['haqqinda']), 0, 150) . '...'; ?></p>
                            </div>
                            
                            <div class="doctor-rating">
                                <div class="rating-stars">
                                    <?php echo generateStars($doctor['calculated_rating']); ?>
                                </div>
                                <span class="rating-value"><?php echo number_format($doctor['calculated_rating'], 1); ?></span>
                            </div>
                        </div>
                        
                        <div class="doctor-actions">
                            <a href="?page=doctor&id=<?php echo $doctor['id']; ?>" class="action-btn view">
                                Profili Gör
                            </a>
                            <?php if ($doctor['phone']): ?>
                            <a href="tel:<?php echo htmlspecialchars($doctor['phone']); ?>" class="action-btn call">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 16.92V19.92C22 20.52 21.39 20.99 20.92 20.99C9.28 20.99 0 11.72 0 0.0799999C0 -0.390001 0.47 -1 1.08 -1H4.09C4.69 -1 5.16 -0.39 5.16 0.08V3.09C5.16 3.69 4.55 4.16 4.08 4.16H2.08C2.08 7.16 4.84 9.92 7.84 9.92C10.84 9.92 13.6 7.16 13.6 4.16H11.6C11.13 4.16 10.52 3.69 10.52 3.09V0.08C10.52 -0.39 11.13 -1 11.6 -1H14.61C15.21 -1 15.68 -0.39 15.68 0.08C15.68 11.72 6.4 20.99 -5.24 20.99C-5.71 20.99 -6.32 20.52 -6.32 19.92V16.92C-6.32 16.32 -5.71 15.85 -5.24 15.85C-2.24 15.85 0.52 13.09 0.52 10.09C0.52 7.09 -2.24 4.33 -5.24 4.33C-5.71 4.33 -6.32 3.86 -6.32 3.26V0.25C-6.32 -0.35 -5.71 -0.82 -5.24 -0.82C6.4 -0.82 15.68 8.45 15.68 20.09C15.68 20.56 15.21 21.17 14.61 21.17H11.6C11.13 21.17 10.52 20.56 10.52 20.09V17.08C10.52 16.48 11.13 16.01 11.6 16.01H13.6C13.6 13.01 10.84 10.25 7.84 10.25C4.84 10.25 2.08 13.01 2.08 16.01H4.08C4.55 16.01 5.16 16.48 5.16 17.08V20.09C5.16 20.56 4.69 21.17 4.09 21.17H1.08C0.47 21.17 0 20.56 0 20.09C0 8.45 9.28 -0.82 20.92 -0.82C21.39 -0.82 22 -0.35 22 0.25V3.26C22 3.86 21.39 4.33 20.92 4.33C17.92 4.33 15.16 7.09 15.16 10.09C15.16 13.09 17.92 15.85 20.92 15.85C21.39 15.85 22 16.32 22 16.92Z" fill="currentColor"/>
                                </svg>
                                Zəng Et
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php else: ?>
                <div class="no-results">
                    <div class="no-results-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 21L16.514 16.506M19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="no-results-title">Həkim Tapılmadı</h3>
                    <p class="no-results-text">Bu kateqoriyada həkim mövcud deyil. Digər kateqoriyalara baxın.</p>
                    <a href="/" class="no-results-btn">Ana Səhifəyə Qayıt</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <style>
        .category-page {
            padding: 40px 0;
            background: white;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 16px;
        }
        
        .page-description {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 20px;
        }
        
        .results-count {
            color: #374151;
            font-weight: 500;
        }
        
        .count-number {
            color: #2563eb;
            font-weight: 700;
        }
        
        .filters-section {
            background: #f8fafc;
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 40px;
        }
        
        .filters-form {
            display: flex;
            gap: 20px;
            align-items: end;
        }
        
        .filter-group {
            flex: 1;
        }
        
        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #374151;
        }
        
        .filter-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            font-size: 14px;
        }
        
        .filter-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background-color 0.2s;
        }
        
        .filter-btn:hover {
            background: #1d4ed8;
        }
        
        .doctors-list {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        
        .doctor-list-item {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
            display: flex;
            gap: 24px;
            align-items: flex-start;
            transition: box-shadow 0.2s;
        }
        
        .doctor-list-item:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .doctor-list-item .doctor-image {
            width: 100px;
            height: 100px;
            flex-shrink: 0;
        }
        
        .doctor-list-item .doctor-info {
            flex: 1;
        }
        
        .doctor-list-item .doctor-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex-shrink: 0;
        }
        
        .action-btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .action-btn.view {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #2563eb;
        }
        
        .action-btn.view:hover {
            background: #2563eb;
            color: white;
        }
        
        .action-btn.call {
            background: #2563eb;
            color: white;
        }
        
        .action-btn.call:hover {
            background: #1d4ed8;
        }
        
        .doctor-about p {
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 16px;
        }
        
        .no-results {
            text-align: center;
            padding: 60px 20px;
        }
        
        .no-results-icon {
            color: #d1d5db;
            margin-bottom: 24px;
        }
        
        .no-results-title {
            font-size: 24px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 12px;
        }
        
        .no-results-text {
            color: #6b7280;
            margin-bottom: 24px;
        }
        
        .no-results-btn {
            background: #2563eb;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            display: inline-block;
            transition: background-color 0.2s;
        }
        
        .no-results-btn:hover {
            background: #1d4ed8;
        }
        
        @media (max-width: 768px) {
            .filters-form {
                flex-direction: column;
                align-items: stretch;
            }
            
            .doctor-list-item {
                flex-direction: column;
                text-align: center;
            }
            
            .doctor-list-item .doctor-actions {
                flex-direction: row;
                justify-content: center;
            }
            
            .page-title {
                font-size: 28px;
            }
        }
        </style>