<div class="doctor-detail">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" class="breadcrumb-link">Ana Səhifə</a>
            <span class="breadcrumb-separator">/</span>
            <a href="?page=category&slug=<?php echo $doctor['category_slug']; ?>" class="breadcrumb-link">
                <?php echo htmlspecialchars($doctor['category_name']); ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current"><?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?></span>
        </div>
        
        <div class="doctor-profile">
            <div class="doctor-profile-content">
                <div class="doctor-profile-image">
                    <?php if ($doctor['image']): ?>
                    <img src="<?php echo htmlspecialchars($doctor['image']); ?>" 
                         alt="<?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>"
                         class="doctor-image-large">
                    <?php else: ?>
                    <div class="doctor-image-placeholder-large">
                        <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                            <path d="M12 14C7.58172 14 4 17.5817 4 22H20C20 17.5817 16.4183 14 12 14Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="doctor-profile-info">
                    <h1 class="doctor-name-large">
                        <?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>
                    </h1>
                    
                    <div class="doctor-specialty">
                        <span class="specialty-badge">
                            <?php echo htmlspecialchars($doctor['category_name']); ?>
                        </span>
                    </div>
                    
                    <div class="doctor-rating-large">
                        <div class="rating-stars-large">
                            <?php echo generateStars($doctor['calculated_rating']); ?>
                        </div>
                        <span class="rating-value-large"><?php echo number_format($doctor['calculated_rating'], 1); ?></span>
                        <span class="rating-text">reytinq</span>
                    </div>
                    
                    <div class="doctor-details">
                        <div class="detail-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.3639 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo htmlspecialchars($doctor['region_address']); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 21V19C19 17.9391 18.5786 16.9217 17.8284 16.1716C17.0783 15.4214 16.0609 15 15 15H9C7.93913 15 6.92172 15.4214 6.17157 16.1716C5.42143 16.9217 5 17.9391 5 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span><?php echo htmlspecialchars($doctor['workplace_name']); ?></span>
                        </div>
                        
                        <div class="detail-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 16.92V19.92C22 20.52 21.39 20.99 20.92 20.99C9.28 20.99 0 11.72 0 0.0799999C0 -0.390001 0.47 -1 1.08 -1H4.09C4.69 -1 5.16 -0.39 5.16 0.08V3.09C5.16 3.69 4.55 4.16 4.08 4.16H2.08C2.08 7.16 4.84 9.92 7.84 9.92C10.84 9.92 13.6 7.16 13.6 4.16H11.6C11.13 4.16 10.52 3.69 10.52 3.09V0.08C10.52 -0.39 11.13 -1 11.6 -1H14.61C15.21 -1 15.68 -0.39 15.68 0.08C15.68 11.72 6.4 20.99 -5.24 20.99C-5.71 20.99 -6.32 20.52 -6.32 19.92V16.92C-6.32 16.32 -5.71 15.85 -5.24 15.85C-2.24 15.85 0.52 13.09 0.52 10.09C0.52 7.09 -2.24 4.33 -5.24 4.33C-5.71 4.33 -6.32 3.86 -6.32 3.26V0.25C-6.32 -0.35 -5.71 -0.82 -5.24 -0.82C6.4 -0.82 15.68 8.45 15.68 20.09C15.68 20.56 15.21 21.17 14.61 21.17H11.6C11.13 21.17 10.52 20.56 10.52 20.09V17.08C10.52 16.48 11.13 16.01 11.6 16.01H13.6C13.6 13.01 10.84 10.25 7.84 10.25C4.84 10.25 2.08 13.01 2.08 16.01H4.08C4.55 16.01 5.16 16.48 5.16 17.08V20.09C5.16 20.56 4.69 21.17 4.09 21.17H1.08C0.47 21.17 0 20.56 0 20.09C0 8.45 9.28 -0.82 20.92 -0.82C21.39 -0.82 22 -0.35 22 0.25V3.26C22 3.86 21.39 4.33 20.92 4.33C17.92 4.33 15.16 7.09 15.16 10.09C15.16 13.09 17.92 15.85 20.92 15.85C21.39 15.85 22 16.32 22 16.92Z" fill="currentColor"/>
                            </svg>
                            <?php if ($doctor['phone']): ?>
                            <a href="tel:<?php echo htmlspecialchars($doctor['phone']); ?>" class="phone-link">
                                <?php echo htmlspecialchars($doctor['phone']); ?>
                            </a>
                            <?php else: ?>
                            <span>Təlim məlumatı yoxdur</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($doctor['phone']): ?>
                    <div class="doctor-actions">
                        <a href="tel:<?php echo htmlspecialchars($doctor['phone']); ?>" class="action-btn primary">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 16.92V19.92C22 20.52 21.39 20.99 20.92 20.99C9.28 20.99 0 11.72 0 0.0799999C0 -0.390001 0.47 -1 1.08 -1H4.09C4.69 -1 5.16 -0.39 5.16 0.08V3.09C5.16 3.69 4.55 4.16 4.08 4.16H2.08C2.08 7.16 4.84 9.92 7.84 9.92C10.84 9.92 13.6 7.16 13.6 4.16H11.6C11.13 4.16 10.52 3.69 10.52 3.09V0.08C10.52 -0.39 11.13 -1 11.6 -1H14.61C15.21 -1 15.68 -0.39 15.68 0.08C15.68 11.72 6.4 20.99 -5.24 20.99C-5.71 20.99 -6.32 20.52 -6.32 19.92V16.92C-6.32 16.32 -5.71 15.85 -5.24 15.85C-2.24 15.85 0.52 13.09 0.52 10.09C0.52 7.09 -2.24 4.33 -5.24 4.33C-5.71 4.33 -6.32 3.86 -6.32 3.26V0.25C-6.32 -0.35 -5.71 -0.82 -5.24 -0.82C6.4 -0.82 15.68 8.45 15.68 20.09C15.68 20.56 15.21 21.17 14.61 21.17H11.6C11.13 21.17 10.52 20.56 10.52 20.09V17.08C10.52 16.48 11.13 16.01 11.6 16.01H13.6C13.6 13.01 10.84 10.25 7.84 10.25C4.84 10.25 2.08 13.01 2.08 16.01H4.08C4.55 16.01 5.16 16.48 5.16 17.08V20.09C5.16 20.56 4.69 21.17 4.09 21.17H1.08C0.47 21.17 0 20.56 0 20.09C0 8.45 9.28 -0.82 20.92 -0.82C21.39 -0.82 22 -0.35 22 0.25V3.26C22 3.86 21.39 4.33 20.92 4.33C17.92 4.33 15.16 7.09 15.16 10.09C15.16 13.09 17.92 15.85 20.92 15.85C21.39 15.85 22 16.32 22 16.92Z" fill="currentColor"/>
                            </svg>
                            İndi Zəng Edin
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="doctor-content">
                    <div class="doctor-about">
                        <h2 class="content-title">Həkim Haqqında</h2>
                        <div class="about-text">
                            <?php echo $doctor['haqqinda']; ?>
                        </div>
                    </div>
                    
                    <div class="doctor-education">
                        <h2 class="content-title">Təhsil</h2>
                        <div class="education-text">
                            <?php echo $doctor['tehsil']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="doctor-comments-section">
        <h2 class="content-title">Rəylər və Reytinqlər</h2>

        <div class="comment-form-container">
            <h3>Rəy Bildirin</h3>
            <form action="" method="POST" class="comment-form">
                <input type="hidden" name="doctor_id" value="<?php echo $doctor['id']; ?>">
                <div class="form-group">
                    <label for="user_name">Adınız:</label>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div class="form-group">
                    <label for="rating">Reytinq:</label>
                    <div class="rating-input">
                        <?php for ($i = 5; $i >= 1; $i--): ?>
                            <input type="radio" id="rating<?php echo $i; ?>" name="rating" value="<?php echo $i; ?>" required>
                            <label for="rating<?php echo $i; ?>"><?php echo $i; ?> Ulduz</label>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Rəyiniz:</label>
                    <textarea id="comment" name="comment" rows="5" required></textarea>
                </div>
                <button type="submit" name="submit_comment" class="submit-comment-btn">Rəy Göndər</button>
            </form>
        </div>

        <div class="comments-list">
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-item">
                        <div class="comment-header">
                            <span class="comment-author"><?php echo htmlspecialchars($comment['user_name']); ?></span>
                            <span class="comment-rating"><?php echo generateStars($comment['rating']); ?></span>
                            <span class="comment-date"><?php echo date('d.m.Y H:i', strtotime($comment['created_at'])); ?></span>
                        </div>
                        <p class="comment-text"><?php echo substr(htmlspecialchars($comment['comment']), 0, 100); ?>...</p>
                        <a href="?page=comment&id=<?php echo $comment['id']; ?>" class="view-comment-link">Tam rəyə bax</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-comments">Bu həkim üçün heç bir rəy yoxdur. İlk rəyinizi siz bildirin!</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.doctor-comments-section {
    margin-top: 40px;
    background: #f9fafb;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.doctor-comments-section .content-title {
    font-size: 28px;
    color: #1a1a1a;
    margin-bottom: 25px;
    text-align: center;
}

.comment-form-container {
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    margin-bottom: 30px;
}

.comment-form-container h3 {
    font-size: 22px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.comment-form .form-group {
    margin-bottom: 18px;
}

.comment-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #374151;
}

.comment-form input[type="text"],
.comment-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 16px;
    box-sizing: border-box;
}

.comment-form textarea {
    resize: vertical;
}

.comment-form input[type="text"]:focus,
.comment-form textarea:focus {
    border-color: #2563eb;
    outline: none;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
}

.comment-form .rating-input {
    display: flex;
    flex-direction: row-reverse; /* Stars from right to left */
    justify-content: center;
    gap: 5px;
}

.comment-form .rating-input input[type="radio"] {
    display: none;
}

.comment-form .rating-input label {
    cursor: pointer;
    width: 30px;
    height: 30px;
    background-color: #d1d5db; /* Empty star color */
    -webkit-mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'%3E%3Cpath d='M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z'%3E%3C/path%3E%3C/svg%3E") no-repeat center / contain;
    mask: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor'%3E%3Cpath d='M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z'%3E%3C/path%3E%3C/svg%3E") no-repeat center / contain;
    color: transparent; /* Hide text */
    transition: background-color 0.2s;
}

.comment-form .rating-input input[type="radio"]:checked ~ label,
.comment-form .rating-input label:hover,
.comment-form .rating-input label:hover ~ label {
    background-color: #facc15; /* Filled star color */
}

.submit-comment-btn {
    background: #2563eb;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s;
    width: 100%;
    font-size: 18px;
}

.submit-comment-btn:hover {
    background: #1d4ed8;
}

.comments-list {
    margin-top: 30px;
}

.comment-item {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
}

.comment-item:last-child {
    margin-bottom: 0;
}

.comment-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    flex-wrap: wrap;
}

.comment-author {
    font-weight: 600;
    color: #1a1a1a;
    font-size: 17px;
}

.comment-rating .star-full,
.comment-rating .star-half {
    color: #facc15;
    font-size: 18px;
}

.comment-rating .star-empty {
    color: #d1d5db;
    font-size: 18px;
}

.comment-date {
    font-size: 14px;
    color: #6b7280;
    margin-left: auto; /* Pushes date to the right */
}

.comment-text {
    color: #374151;
    line-height: 1.6;
    margin-top: 0;
}

.no-comments {
    text-align: center;
    color: #6b7280;
    padding: 20px;
    border: 1px dashed #d1d5db;
    border-radius: 8px;
    background: #f0f4f8;
}

@media (max-width: 768px) {
    .doctor-comments-section {
        padding: 20px;
    }

    .comment-form-container {
        padding: 20px;
    }

    .comment-form .rating-input {
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .comment-form .rating-input label {
        width: 25px;
        height: 25px;
    }

    .comment-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }

    .comment-date {
        margin-left: 0;
    }
}
</style>