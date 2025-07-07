<?php
// Get all categories
function getAllCategories($db) {
    $query = "SELECT * FROM doctor_categories ORDER BY name ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get all regions
function getAllRegions($db) {
    $query = "SELECT * FROM regions ORDER BY address ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get all workplaces
function getAllWorkplaces($db) {
    $query = "SELECT * FROM doctor_workplaces ORDER BY name ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get doctors with filters
function getDoctors($db, $category_filter = '', $region_filter = '', $workplace_filter = '', $search_query = '', $limit = 20) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              WHERE 1=1";
    
    $params = [];
    
    if ($category_filter) {
        $query .= " AND c.slug = :category";
        $params[':category'] = $category_filter;
    }
    
    if ($region_filter) {
        $query .= " AND r.slug = :region";
        $params[':region'] = $region_filter;
    }
    
    if ($workplace_filter) {
        $query .= " AND w.slug = :workplace";
        $params[':workplace'] = $workplace_filter;
    }
    
    if ($search_query) {
        $query .= " AND (d.fullName LIKE :search OR d.title LIKE :search OR d.haqqinda LIKE :search OR c.name LIKE :search)";
        $params[':search'] = '%' . $search_query . '%';
    }
    
    $query .= " GROUP BY d.id ORDER BY calculated_rating DESC, d.fullName ASC LIMIT :limit";
    $params[':limit'] = $limit;
    
    $stmt = $db->prepare($query);
    
    // Bind parameters
    foreach ($params as $key => $value) {
        if ($key === ':limit') {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
        } else {
            $stmt->bindValue($key, $value);
        }
    }
    
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get doctor by ID
function getDoctorById($db, $id) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              WHERE d.id = :id
              GROUP BY d.id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get category by slug
function getCategoryBySlug($db, $slug) {
    $query = "SELECT * FROM doctor_categories WHERE slug = :slug";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get region by slug
function getRegionBySlug($db, $slug) {
    $query = "SELECT * FROM regions WHERE slug = :slug";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get workplace by slug
function getWorkplaceBySlug($db, $slug) {
    $query = "SELECT * FROM doctor_workplaces WHERE slug = :slug";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':slug', $slug);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get doctors by category
function getDoctorsByCategory($db, $category_id) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              WHERE d.category_id = :category_id
              GROUP BY d.id
              ORDER BY calculated_rating DESC, d.fullName ASC";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get doctors by region
function getDoctorsByRegion($db, $region_id) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              WHERE d.region_id = :region_id
              GROUP BY d.id
              ORDER BY calculated_rating DESC, d.fullName ASC";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':region_id', $region_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get doctors by workplace
function getDoctorsByWorkplace($db, $workplace_id) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              WHERE d.workplace_id = :workplace_id
              GROUP BY d.id
              ORDER BY calculated_rating DESC, d.fullName ASC";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':workplace_id', $workplace_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Generate stars for rating
function generateStars($rating) {
    $stars = '';
    $fullStars = floor($rating);
    $hasHalfStar = ($rating - $fullStars) >= 0.5;
    
    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '<i class="star-full">★</i>';
    }
    
    if ($hasHalfStar) {
        $stars .= '<i class="star-half">★</i>';
    }
    
    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '<i class="star-empty">☆</i>';
    }
    
    return $stars;
}

// Create SEO-friendly URL
function createUrl($page, $slug = '', $id = '') {
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
    
    switch ($page) {
        case 'doctor':
            return $base_url . '/doctor/' . $id . '/' . $slug;
        case 'category':
            return $base_url . '/category/' . $slug;
        case 'region':
            return $base_url . '/region/' . $slug;
        case 'workplace':
            return $base_url . '/workplace/' . $slug;
        default:
            return $base_url . '/';
    }
}

// Get total doctors count
function getTotalDoctorsCount($db) {
    $query = "SELECT COUNT(*) as total FROM doctors";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

// Get featured doctors (top rated)
function getFeaturedDoctors($db, $limit = 6) {
    $query = "SELECT d.*, 
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug,
                     (d.rating + IFNULL(SUM(dc.rating), 0)) / (1 + COUNT(dc.rating)) AS calculated_rating
              FROM doctors d
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              LEFT JOIN doctor_comments dc ON d.id = dc.doctor_id
              GROUP BY d.id
              ORDER BY calculated_rating DESC, d.fullName ASC 
              LIMIT :limit";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Add a new doctor comment
function addDoctorComment($db, $doctor_id, $user_name, $comment, $rating) {
    $query = "INSERT INTO doctor_comments (doctor_id, user_name, comment, rating) VALUES (:doctor_id, :user_name, :comment, :rating)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
    $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    return $stmt->execute();
}

// Get comments for a specific doctor
function getDoctorComments($db, $doctor_id) {
    $query = "SELECT * FROM doctor_comments WHERE doctor_id = :doctor_id ORDER BY created_at DESC";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':doctor_id', $doctor_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get a single comment by ID with doctor details
function getCommentById($db, $comment_id) {
    $query = "SELECT dc.*, 
                     d.title, d.fullName, d.image, d.haqqinda, d.tehsil, d.rating as base_rating,
                     c.name as category_name, c.slug as category_slug,
                     r.address as region_address, r.slug as region_slug,
                     w.name as workplace_name, w.slug as workplace_slug
              FROM doctor_comments dc
              JOIN doctors d ON dc.doctor_id = d.id
              JOIN doctor_categories c ON d.category_id = c.id
              JOIN regions r ON d.region_id = r.id
              JOIN doctor_workplaces w ON d.workplace_id = w.id
              WHERE dc.id = :comment_id";
    
    $stmt = $db->prepare($query);
    $stmt->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get recent comments
function getRecentComments($db, $limit = 5) {
    $query = "SELECT dc.id, dc.comment, dc.rating, dc.created_at, d.id as doctor_id, d.title, d.fullName, c.name as category_name
              FROM doctor_comments dc
              JOIN doctors d ON dc.doctor_id = d.id
              JOIN doctor_categories c ON d.category_id = c.id
              ORDER BY dc.created_at DESC
              LIMIT :limit";
    
    $stmt = $db->prepare($query);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>