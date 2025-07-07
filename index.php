<?php
require_once 'config/database.php';
require_once 'includes/functions.php';

// Get page parameter
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Initialize database
$database = new Database();
$db = $database->getConnection();

// Get all categories for navigation
$categories = getAllCategories($db);
$regions = getAllRegions($db);
$workplaces = getAllWorkplaces($db);

// Get filters
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$region_filter = isset($_GET['region']) ? $_GET['region'] : '';
$workplace_filter = isset($_GET['workplace']) ? $_GET['workplace'] : '';
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// SEO Meta Data - Default values
$page_title = 'Azərbaycan Həkimləri Kataloqu - Ən Yaxşı Həkimləri Tapın';
$page_description = 'Azərbaycanda ən yaxşı həkimləri tapın. Kategorialar, bölgələr və məkan əsasında həkimləri axtarın. Həkimlərin profillərini, reytinqlərini və əlaqə məlumatlarını görün.';
$page_keywords = 'həkim, doktor, Azərbaycan, tibbi xidmət, həkim tap, tibbi konsultasiya, həkim kataloqu';
$page_author = 'Həkimləri Tapın';
$page_og_image = '';
$page_og_description = $page_description;

// Route to different pages
switch ($page) {
    case 'doctor':
        $doctor_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($doctor_id > 0) {
            $doctor = getDoctorById($db, $doctor_id);
            if ($doctor) {
                // Handle comment submission
                if (isset($_POST['submit_comment'])) {
                    $doctor_id = $doctor['id'];
                    $user_name = trim($_POST['user_name']);
                    $comment_text = trim($_POST['comment']);
                    $rating = (int)$_POST['rating'];

                    if (!empty($user_name) && !empty($comment_text) && $rating >= 1 && $rating <= 5) {
                        addDoctorComment($db, $doctor_id, $user_name, $comment_text, $rating);
                        // Redirect to prevent form resubmission
                        header("Location: ?page=doctor&id=" . $doctor_id);
                        exit();
                    }
                }

                // Fetch comments for the doctor
                $comments = getDoctorComments($db, $doctor['id']);

                $site_name = 'Həkimləri Tapın';
                // Compose unique, keyword-rich meta tags
                $doctor_title = trim($doctor['title']);
                $doctor_name = trim($doctor['fullName']);
                $doctor_category = trim($doctor['category_name']);
                $doctor_workplace = trim($doctor['workplace_name']);
                $doctor_region = trim($doctor['region_address']);
                $doctor_image = $doctor['image'] ? $doctor['image'] : '';
                $page_title = "$doctor_title $doctor_name | $doctor_category | $doctor_workplace | $doctor_region | $site_name";
                $page_description = "$doctor_category $doctor_title $doctor_name - $doctor_workplace, $doctor_region. Təcrübəli $doctor_category, yüksək reytinqli həkim. Əlaqə və profil məlumatları burada.";
                $page_keywords = "$doctor_name, $doctor_category, $doctor_title $doctor_name, $doctor_workplace, $doctor_region, həkim tap, $doctor_category tap, savadlı doktor, uzman həkim, $doctor_category $doctor_workplace, $doctor_category $doctor_region";
                $page_author = $site_name;
                $page_og_image = $doctor_image;
                $page_og_description = "$doctor_category $doctor_title $doctor_name | $doctor_workplace, $doctor_region. Ən yaxşı həkimlər burada.";
                include 'templates/header.php';
                include 'templates/doctor-detail.php';
            } else {
                header("HTTP/1.0 404 Not Found");
                include 'templates/header.php';
                include 'templates/404.php';
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'templates/header.php';
            include 'templates/404.php';
        }
        break;
    
    case 'category':
        $category_slug = isset($_GET['slug']) ? $_GET['slug'] : '';
        $category_info = getCategoryBySlug($db, $category_slug);
        if ($category_info) {
            $category_doctors = getDoctorsByCategory($db, $category_info['id']);
            $page_title = $category_info['name'] . ' Həkimləri | Həkimləri Tapın';
            $page_description = $category_info['name'] . ' sahəsində ən yaxşı həkimləri tapın. Təcrübəli ' . $category_info['name'] . ' həkimləri ilə əlaqə saxlayın.';
            $page_keywords = strtolower($category_info['name']) . ', ' . $category_info['name'] . ' həkim, ' . $category_info['name'] . ' doktor, həkim tap, həkim axtar, savadli doktor';
            $page_author = 'Həkimləri Tapın';
            $page_og_image = '';
            $page_og_description = $page_description;
            include 'templates/header.php';
            include 'templates/category-page.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'templates/header.php';
            include 'templates/404.php';
        }
        break;
    
    case 'region':
        $region_slug = isset($_GET['slug']) ? $_GET['slug'] : '';
        $region_info = getRegionBySlug($db, $region_slug);
        if ($region_info) {
            $region_doctors = getDoctorsByRegion($db, $region_info['id']);
            $page_title = $region_info['address'] . ' Həkimləri | Həkimləri Tapın';
            $page_description = $region_info['address'] . ' bölgəsində ən yaxşı həkimləri tapın. Yaxın həkimləri axtarın.';
            $page_keywords = strtolower($region_info['address']) . ', həkim, doktor, həkim tap, həkim axtar, savadli doktor';
            $page_author = 'Həkimləri Tapın';
            $page_og_image = '';
            $page_og_description = $page_description;
            include 'templates/header.php';
            include 'templates/region-page.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'templates/header.php';
            include 'templates/404.php';
        }
        break;
    
    case 'workplace':
        $workplace_slug = isset($_GET['slug']) ? $_GET['slug'] : '';
        $workplace_info = getWorkplaceBySlug($db, $workplace_slug);
        if ($workplace_info) {
            $workplace_doctors = getDoctorsByWorkplace($db, $workplace_info['id']);
            $page_title = $workplace_info['name'] . ' Həkimləri | Həkimləri Tapın';
            $page_description = $workplace_info['name'] . ' xəstəxanasında çalışan ən yaxşı həkimləri tapın.';
            $page_keywords = strtolower($workplace_info['name']) . ', həkim, doktor, həkim tap, həkim axtar, savadli doktor';
            $page_author = 'Həkimləri Tapın';
            $page_og_image = '';
            $page_og_description = $page_description;
            include 'templates/header.php';
            include 'templates/workplace-page.php';
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'templates/header.php';
            include 'templates/404.php';
        }
        break;
    
    case 'comment':
        $comment_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($comment_id > 0) {
            $comment = getCommentById($db, $comment_id);
            if ($comment) {
                // Extract doctor details from comment for SEO
                $doctor = [
                    'id' => $comment['doctor_id'],
                    'title' => $comment['title'],
                    'fullName' => $comment['fullName'],
                    'image' => $comment['image'],
                    'category_name' => $comment['category_name'],
                    'category_slug' => $comment['category_slug'],
                    'workplace_name' => $comment['workplace_name'],
                    'region_address' => $comment['region_address'],
                ];

                $site_name = 'Həkimləri Tapın';
                $comment_snippet = substr(strip_tags($comment['comment']), 0, 50);
                if (strlen($comment['comment']) > 50) {
                    $comment_snippet .= '...';
                }

                $page_title = "Rəy: \"" . $comment_snippet . "\" | " . $doctor['title'] . " " . $doctor['fullName'] . " | " . $doctor['category_name'] . " | " . $site_name;
                $page_description = "Həkim " . $doctor['title'] . " " . $doctor['fullName'] . " haqqında rəy: \"" . htmlspecialchars($comment['comment']) . "\". İstifadəçi: " . htmlspecialchars($comment['user_name']) . ".";
                $page_keywords = "həkim rəyi, " . strtolower($doctor['fullName']) . ", " . strtolower($doctor['category_name']) . ", " . strtolower($comment['user_name']) . ", " . strtolower($comment_snippet) . ", həkimlər, doktorlar, rəylər, reytinq";
                $page_author = $site_name;
                $page_og_image = $doctor['image'] ? $doctor['image'] : '';
                $page_og_description = "Həkim " . $doctor['title'] . " " . $doctor['fullName'] . " haqqında rəy: \"" . htmlspecialchars($comment['comment']) . "\".";

                include 'templates/header.php';
                include 'templates/comment-detail.php';
            } else {
                header("HTTP/1.0 404 Not Found");
                include 'templates/header.php';
                include 'templates/404.php';
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            include 'templates/header.php';
            include 'templates/404.php';
        }
        break;
    
    default:
        $page_title = 'Azərbaycan Həkimləri Kataloqu - Həkimləri Tapın';
        $page_description = 'Azərbaycanda ən yaxşı həkimləri tapın. Kategorialar, bölgələr və məkan əsasında həkimləri axtarın. Həkimlərin profillərini, reytinqlərini və əlaqə məlumatlarını görün.';
        $page_keywords = 'həkim, doktor, Azərbaycan, tibbi xidmət, həkim tap, tibbi konsultasiya, həkim kataloqu';
        $page_author = 'Həkimləri Tapın';
        $page_og_image = '';
        $page_og_description = $page_description;
        $recent_comments = getRecentComments($db);
        include 'templates/header.php';
        include 'templates/home.php';
        break;
}

include 'templates/footer.php';
?>