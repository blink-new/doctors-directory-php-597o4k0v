<original_content>
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Azərbaycanda Ən Yaxşı <span class="highlight">Həkimləri</span> Tapın
                    </h1>
                    <p class="hero-description">
                        Təcrübəli həkimləri kateqoriya, bölgə və iş yeri əsasında axtarın. 
                        Həkimlərin profillərini, reytinqlərini və əlaqə məlumatlarını görün.
                    </p>
                    
                    <div class="hero-search">
                        <form class="search-form-hero" action="/" method="GET">
                            <div class="search-inputs">
                                <input type="text" name="search" placeholder="Həkim adı, ixtisas axtarın..." 
                                       value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                                       class="search-input-hero">
                                
                                <select name="category" class="search-select">
                                    <option value="">Bütün kateqoriyalar</option>
                                    <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['slug']; ?>" 
                                            <?php echo (isset($_GET['category']) && $_GET['category'] == $category['slug']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                
                                <select name="region" class="search-select">
                                    <option value="">Bütün bölgələr</option>
                                    <?php foreach ($regions as $region): ?>
                                    <option value="<?php echo $region['slug']; ?>" 
                                            <?php echo (isset($_GET['region']) && $_GET['region'] == $region['slug']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($region['address']); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                
                                <button type="submit" class="search-btn-hero">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21 21L16.514 16.506M19 10.5C19 15.194 15.194 19 10.5 19C5.806 19 2 15.194 2 10.5C2 5.806 5.806 2 10.5 2C15.194 2 19 5.806 19 10.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Axtarın
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number"><?php echo getTotalDoctorsCount($db); ?></div>
                            <div class="stat-label">Həkim</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo count($categories); ?></div>
                            <div class="stat-label">İxtisas</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number"><?php echo count($workplaces); ?></div>
                            <div class="stat-label">Xəstəxana</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="featured-doctors">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Ən Yaxşı Reytinqli Həkimlər</h2>
                    <p class="section-description">Yüksək reytinqli və təcrübəli həkimlərimiz</p>
                </div>
                
                <div class="doctors-grid">
                    <?php 
                    $featured_doctors = getFeaturedDoctors($db, 6);
                    foreach ($featured_doctors as $doctor): 
                    ?>
                    <div class="doctor-card">
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
                            
                            <div class="doctor-rating">
                                <div class="rating-stars">
                                    <?php echo generateStars($doctor['calculated_rating']); ?>
                                </div>
                                <span class="rating-value"><?php echo number_format($doctor['calculated_rating'], 1); ?></span>
                            </div>
                            
                            <?php if ($doctor['phone']): ?>
                            <div class="doctor-contact">
                                <a href="tel:<?php echo htmlspecialchars($doctor['phone']); ?>" class="contact-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 16.92V19.92C22 20.52 21.39 20.99 20.92 20.99C9.28 20.99 0 11.72 0 0.0799999C0 -0.390001 0.47 -1 1.08 -1H4.09C4.69 -1 5.16 -0.39 5.16 0.08V3.09C5.16 3.69 4.55 4.16 4.08 4.16H2.08C2.08 7.16 4.84 9.92 7.84 9.92C10.84 9.92 13.6 7.16 13.6 4.16H11.6C11.13 4.16 10.52 3.69 10.52 3.09V0.08C10.52 -0.39 11.13 -1 11.6 -1H14.61C15.21 -1 15.68 -0.39 15.68 0.08C15.68 11.72 6.4 20.99 -5.24 20.99C-5.71 20.99 -6.32 20.52 -6.32 19.92V16.92C-6.32 16.32 -5.71 15.85 -5.24 15.85C-2.24 15.85 0.52 13.09 0.52 10.09C0.52 7.09 -2.24 4.33 -5.24 4.33C-5.71 4.33 -6.32 3.86 -6.32 3.26V0.25C-6.32 -0.35 -5.71 -0.82 -5.24 -0.82C6.4 -0.82 15.68 8.45 15.68 20.09C15.68 20.56 15.21 21.17 14.61 21.17H11.6C11.13 21.17 10.52 20.56 10.52 20.09V17.08C10.52 16.48 11.13 16.01 11.6 16.01H13.6C13.6 13.01 10.84 10.25 7.84 10.25C4.84 10.25 2.08 13.01 2.08 16.01H4.08C4.55 16.01 5.16 16.48 5.16 17.08V20.09C5.16 20.56 4.69 21.17 4.09 21.17H1.08C0.47 21.17 0 20.56 0 20.09C0 8.45 9.28 -0.82 20.92 -0.82C21.39 -0.82 22 -0.35 22 0.25V3.26C22 3.86 21.39 4.33 20.92 4.33C17.92 4.33 15.16 7.09 15.16 10.09C15.16 13.09 17.92 15.85 20.92 15.85C21.39 15.85 22 16.32 22 16.92Z" fill="currentColor"/>
                                    </svg>
                                    Zəng edin
                                </a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <section class="categories-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Həkim Kateqoriyaları</h2>
                    <p class="section-description">İhtiyacınız olan ixtisas sahəsini seçin</p>
                </div>
                
                <div class="categories-grid">
                    <?php foreach (array_slice($categories, 0, 12) as $category): ?>
                    <a href="?page=category&slug=<?php echo $category['slug']; ?>" class="category-card">
                        <div class="category-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 2V4M8 2V4M3 8H21M5 4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="category-name"><?php echo htmlspecialchars($category['name']); ?></h3>
                        <div class="category-arrow">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Həkiminizi Tapın</h2>
                    <p class="cta-description">
                        Sağlamlığınız üçün ən uyğun həkimi seçin. Bizim platformada 
                        minlərlə təcrübəli həkim var.
                    </p>
                    <a href="#" class="cta-btn">Həkimləri Göstər</a>
                </div>
            </div>
        </section>
        
        <section class="recent-comments-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Son Rəylər</h2>
                    <p class="section-description">Pasiyentlərin həkimlər haqqında ən son rəyləri.</p>
                </div>
                <div class="recent-comments-grid">
                    <?php foreach ($recent_comments as $comment): ?>
                        <div class="comment-card-home">
                            <div class="comment-card-header">
                                <span class="comment-card-rating"><?php echo generateStars($comment['rating']); ?></span>
                                <span class="comment-card-date"><?php echo date('d.m.Y', strtotime($comment['created_at'])); ?></span>
                            </div>
                            <p class="comment-card-text">
                                <?php echo substr(htmlspecialchars($comment['comment']), 0, 100); ?>...
                            </p>
                            <div class="comment-card-doctor">
                                <a href="?page=doctor&id=<?php echo $comment['doctor_id']; ?>">
                                    <?php echo htmlspecialchars($comment['title'] . ' ' . $comment['fullName']); ?>
                                </a>
                                <span>- <?php echo htmlspecialchars($comment['category_name']); ?></span>
                            </div>
                            <a href="?page=comment&id=<?php echo $comment['id']; ?>" class="comment-card-link">Tam rəyə bax</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <style>
.recent-comments-section {
    padding: 80px 0;
    background: #f8fafc;
}

.recent-comments-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.comment-card-home {
    background: white;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    border: 1px solid #f3f4f6;
    display: flex;
    flex-direction: column;
}

.comment-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}

.comment-card-rating .star-full {
    color: #fbbf24;
    font-style: normal;
}

.comment-card-date {
    font-size: 14px;
    color: #6b7280;
}

.comment-card-text {
    color: #374151;
    line-height: 1.6;
    margin-bottom: 16px;
    flex-grow: 1;
}

.comment-card-doctor {
    font-size: 14px;
    margin-bottom: 16px;
}

.comment-card-doctor a {
    font-weight: 600;
    color: #1a1a1a;
    text-decoration: none;
}

.comment-card-doctor a:hover {
    color: #2563eb;
}

.comment-card-doctor span {
    color: #6b7280;
}

.comment-card-link {
    color: #2563eb;
    text-decoration: none;
    font-weight: 600;
    align-self: flex-start;
}

.comment-card-link:hover {
    text-decoration: underline;
}
        </style>
</original_content>