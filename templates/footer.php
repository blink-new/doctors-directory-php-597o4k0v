    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3 class="footer-title">Həkimləri Tapın</h3>
                    <p class="footer-description">
                        Azərbaycanda ən yaxşı həkimləri tapın. Sağlamlığınız üçün ən uyğun təcrübəli həkimi seçin.
                    </p>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-subtitle">Kateqoriyalar</h4>
                    <ul class="footer-links">
                        <?php foreach (array_slice($categories, 0, 6) as $category): ?>
                        <li><a href="?page=category&slug=<?php echo $category['slug']; ?>" class="footer-link">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-subtitle">Şəhərlər</h4>
                    <ul class="footer-links">
                        <?php foreach (array_slice($regions, 0, 6) as $region): ?>
                        <li><a href="?page=region&slug=<?php echo $region['slug']; ?>" class="footer-link">
                            <?php echo htmlspecialchars($region['address']); ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4 class="footer-subtitle">Əlaqə</h4>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Haqqımızda</a></li>
                        <li><a href="#" class="footer-link">Əlaqə</a></li>
                        <li><a href="#" class="footer-link">Gizlilik Siyasəti</a></li>
                        <li><a href="#" class="footer-link">İstifadə Şərtləri</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="footer-copyright">
                    © <?php echo date('Y'); ?> Həkimləri Tapın. Bütün hüquqlar qorunur.
                </p>
            </div>
        </div>
    </footer>
    
    <script src="assets/js/main.js"></script>
</body>
</html>