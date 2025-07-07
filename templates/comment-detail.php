<div class="comment-detail-page">
    <div class="container">
        <div class="breadcrumb">
            <a href="/" class="breadcrumb-link">Ana Səhifə</a>
            <span class="breadcrumb-separator">/</span>
            <a href="?page=doctor&id=<?php echo $doctor['id']; ?>" class="breadcrumb-link">
                <?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>
            </a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current">Rəy</span>
        </div>

        <div class="comment-card">
            <div class="comment-header">
                <span class="comment-author"><?php echo htmlspecialchars($comment['user_name']); ?></span>
                <span class="comment-rating"><?php echo generateStars($comment['rating']); ?></span>
                <span class="comment-date"><?php echo date('d.m.Y H:i', strtotime($comment['created_at'])); ?></span>
            </div>
            <p class="comment-text"><?php echo htmlspecialchars($comment['comment']); ?></p>
        </div>

        <div class="doctor-info-card">
            <h2 class="content-title">Həkim Haqqında</h2>
            <div class="doctor-profile-summary">
                <div class="doctor-image">
                    <?php if ($doctor['image']): ?>
                        <img src="<?php echo htmlspecialchars($doctor['image']); ?>" alt="<?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?>">
                    <?php else: ?>
                        <div class="doctor-image-placeholder">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" fill="currentColor"/>
                                <path d="M12 14C7.58172 14 4 17.5817 4 22H20C20 17.5817 16.4183 14 12 14Z" fill="currentColor"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="doctor-details-summary">
                    <h3><a href="?page=doctor&id=<?php echo $doctor['id']; ?>"><?php echo htmlspecialchars($doctor['title'] . ' ' . $doctor['fullName']); ?></a></h3>
                    <p>İxtisas: <?php echo htmlspecialchars($doctor['category_name']); ?></p>
                    <p>İş yeri: <?php echo htmlspecialchars($doctor['workplace_name']); ?></p>
                    <p>Bölgə: <?php echo htmlspecialchars($doctor['region_address']); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.comment-detail-page {
    padding: 40px 0;
    background: white;
}

.comment-card {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.comment-card .comment-header {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.comment-card .comment-author {
    font-weight: 700;
    color: #1a1a1a;
    font-size: 20px;
}

.comment-card .comment-rating .star-full,
.comment-card .comment-rating .star-half {
    color: #facc15;
    font-size: 22px;
}

.comment-card .comment-rating .star-empty {
    color: #d1d5db;
    font-size: 22px;
}

.comment-card .comment-date {
    font-size: 15px;
    color: #6b7280;
    margin-left: auto;
}

.comment-card .comment-text {
    color: #374151;
    line-height: 1.7;
    font-size: 17px;
}

.doctor-info-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.03);
}

.doctor-info-card .content-title {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

.doctor-profile-summary {
    display: flex;
    align-items: center;
    gap: 20px;
}

.doctor-profile-summary .doctor-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
}

.doctor-profile-summary .doctor-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.doctor-profile-summary .doctor-image-placeholder {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
}

.doctor-details-summary h3 {
    font-size: 20px;
    margin-bottom: 8px;
}

.doctor-details-summary h3 a {
    text-decoration: none;
    color: #2563eb;
}

.doctor-details-summary p {
    font-size: 15px;
    color: #374151;
    margin-bottom: 5px;
}

@media (max-width: 768px) {
    .comment-card,
    .doctor-info-card {
        padding: 20px;
    }

    .comment-card .comment-author {
        font-size: 18px;
    }

    .comment-card .comment-rating .star-full,
    .comment-card .comment-rating .star-half,
    .comment-card .comment-rating .star-empty {
        font-size: 20px;
    }

    .comment-card .comment-date {
        margin-left: 0;
    }

    .doctor-profile-summary {
        flex-direction: column;
        text-align: center;
    }

    .doctor-details-summary h3,
    .doctor-details-summary p {
        text-align: center;
    }
}
</style>