 <?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khlong Phra Udom - Pak Kret Tourism</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container border-nav-bottom">
            <a class="navbar-brand d-flex align-items-center gap-3" href="#">
                <div class="brand-icon">
                    <i class="bi bi-stars"></i>
                </div>
                <div>
                    <div class="brand-title">Khlong Phra Udom</div>
                    <div class="brand-subtitle">Pak Kret, Nonthaburi</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#highlights">Highlights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#food">Local Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gems">Hidden Gems</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <div class="d-flex align-items-center gap-2 px-3 py-1 bg-light rounded-pill border">
                            <i class="bi bi-person-circle text-primary"></i>
                            <span class="small fw-semibold"><?php echo htmlspecialchars($user['name'] ?? 'User'); ?></span>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary-custom" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="badge-custom">
                        <i class="bi bi-camera me-2 text-primary"></i>
                        Discover Local Beauty
                    </div>
                    <h1 class="hero-title">
                        Experience the Charm of 
                        <span class="text-gradient">Khlong Phra Udom</span>
                    </h1>
                    <p class="hero-text">
                        คลองพระอุดมมีบรรยากาศธรรมชาติริมน้ำสงบ ร่มรื่น มีวัดสวยๆ ริมคลอง (เช่น วัดโปรดเกษ, วัดบางไผ่, วัดปากคลองพระอุดม) ที่มีสถาปัตยกรรมมอญโบราณ ให้ถ่ายรูปและชมวิถีชุมชน, มีกิจกรรมปั่นจักรยาน หรือล่องเรือชมธรรมชาติสองฝั่งคลอง ไปสัมผัสวิถีชาวบ้านริมน้ำได้ เหมาะสำหรับวันหยุดพักผ่อนใกล้กรุงเทพฯ ที่เน้นความสงบและธรรมชาติวิถีชุมชน. 
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#highlights" class="btn btn-primary-custom">
                            Explore Now
                            <i class="bi bi-chevron-down ms-2"></i>
                        </a>
                        <a href="https://www.youtube.com/watch?v=Yfu6G3f8Xxc" target="_blank" class="btn btn-outline-custom">
                            Watch Video
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1547640084-1dfcc7ef3b22?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8QmFuZ2tva3xlbnwwfHwwfHx8MA%3D%3D" 
                             alt="Khlong Phra Udom landscape" 
                             class="hero-image">
                        <div class="hero-badge">
                            <i class="bi bi-stars text-warning fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section id="highlights" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="badge-custom mb-3">
                    <i class="bi bi-map me-2"></i>
                    Must-See Attractions
                </div>
                <h2 class="section-title">Highlights of the Area</h2>
                <p class="section-subtitle">
                    กิจกรรมหลากหลายให้ทำ รวมถึงวัฒนธรรมและประเภณีอันดีงาม
                </p>
            </div>
            <div class="row g-4">
                <!-- Highlight Card 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="highlight-card">
                        <div class="highlight-image">
                            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/fe/28/66/the-portal-lifestyle.jpg?w=2000&h=-1&s=1" 
                                 alt="อิมแพคอารีน่า เมืองทองธานี">
                        </div>
                        <div class="highlight-body">
                            <div class="highlight-icon bg-primary-subtle text-primary">
                                <i class="bi bi-water"></i>
                            </div>
                            <h3 class="highlight-title">อิมแพคอารีน่า เมืองทองธานี</h3>
                            <p class="highlight-text">
                                 ปัจจุบันถือเป็นศูนย์แสดงสินค้าและการประชุมอันดับ 1 ของประเทศไทย มีพื้นที่ในร่มสำหรับการจัดงานรวมกว่า 140,000 ตารางเมตร ให้บริการเช่าพื้นที่สำหรับจัดกิจกรรมหลากหลาย อาทิ การจัดงานแสดงสินค้า, งานแสดงนิทรรศการ, การจัดงานประชุม-สัมมนา, กิจกรรมพิเศษ คอนเสิร์ต รวมถึงบริการจัดเลี้ยง
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="highlight-card">
                        <div class="highlight-image">
                            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/90/6f/2b/img-20170906-172128-largejpg.jpg?w=2000&h=-1&s=1" 
                                 alt="วัดกู้">
                        </div>
                        <div class="highlight-body">
                            <div class="highlight-icon bg-warning-subtle text-warning">
                                <i class="bi bi-stars"></i>
                            </div>
                            <h3 class="highlight-title">วัดกู้</h3>
                            <p class="highlight-text">
                                วัดใหญ่กลางเมืองปากเกร็ด เดินทางมาได้สะดวกทั้งรถส่วนตัวและรถประจำทาง ทางเข้าเดียวกับไปรษณีย์ปากเกร็ด มีพระนอนองค์ใหญ่ พระพุทธรูปในโบสถ์สีขาวงดงามมาก
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="highlight-card">
                        <div class="highlight-image">
                            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/02/6d/5e/impact-speed-park.jpg?w=1200&h=-1&s=1" 
                                 alt="Impact Speed Park">
                        </div>
                        <div class="highlight-body">
                            <div class="highlight-icon bg-success-subtle text-success">
                                <i class="bi bi-tree"></i>
                            </div>
                            <h3 class="highlight-title">อิมแพ็ค สปีด พาร์ค</h3>
                            <p class="highlight-text">
                                สนามโกคาร์ทระบบไฟฟ้าแห่งใหม่มาตรฐานโลก เปิดตัวด้วยรถโกคาร์ทระบบไฟฟ้ารุ่น RTX จากค่าย SODI kart ผู้ผลิตระดับโลกจากประเทศฝรั่งเศส จำนวน 30 คัน สนามตั้งอยู่บริเวณริมทะเลสาบเมืองทองธานี ภายใต้คอนเซปต์ “ใคร ๆ ก็สนุกเต็มสปีดได้” ตัวสนามใช้งบลงทุนกว่า 60 ล้านบาท ความยาวสูงสุดต่อรอบ 800 เมตร
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Local Food Section -->
    <section id="food" class="section-padding bg-cream">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="badge-custom">
                    <i class="bi bi-cup-hot me-2"></i>
                    Taste the Tradition
                </div>
                <h2 class="section-title">Local Food & Flavors</h2>
                <p class="section-subtitle">
                    Savor authentic Thai cuisine prepared with fresh local ingredients and time-honored recipes.
                </p>
            </div>
            <div class="row g-4">
                <!-- Food Card 1 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="food-card">
                        <div class="food-image">
                            <img src="https://www.jmthaifood.com/wp-content/uploads/2019/12/%E0%B8%9C%E0%B8%B1%E0%B8%94%E0%B9%84%E0%B8%97%E0%B8%A2%E0%B8%81%E0%B8%B8%E0%B9%89%E0%B8%87%E0%B8%AA%E0%B8%94-2.jpg" 
                                 alt="Pad Thai">
                            <div class="food-price">฿70</div>
                        </div>
                        <div class="food-body text-center">
                            <h3 class="food-title">Authentic Pad Thai</h3>
                            <p class="food-text">
                                Freshly prepared with local ingredients.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Food Card 2 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="food-card">
                        <div class="food-image">
                            <img src="https://kitchenconfidante.com/wp-content/uploads/2023/06/Sweet-Coconut-Sticky-Rice-with-Mango-kitchenconfidante.com-5206.jpg" 
                                 alt="Mango Sticky Rice">
                            <div class="food-price">฿60</div>
                        </div>
                        <div class="food-body text-center">
                            <h3 class="food-title">Mango Sticky Rice</h3>
                            <p class="food-text">
                                A beloved Thai dessert.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Food Card 3 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="food-card">
                        <div class="food-image">
                            <img src="https://www.spendwithpennies.com/wp-content/uploads/2019/04/Fruit-Salad-SWP.jpg" 
                                 alt="Fresh Fruit Market">
                        </div>
                        <div class="food-body text-center">
                            <h3 class="food-title">Fresh Fruit</h3>
                            <p class="food-text">
                                Vibrant tropical fruits.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Food Card 4 -->
                <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
                    <div class="food-card">
                        <div class="food-image">
                            <img src="https://images.unsplash.com/photo-1568882041008-c0954e91caba?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0aGFpJTIwc3RyZWV0JTIwZm9vZHxlbnwxfHx8fDE3NjgxMDI1Nzh8MA&ixlib=rb-4.1.0&q=80&w=1080" 
                                 alt="Street Food">
                            <div class="food-price">฿50</div>
                        </div>
                        <div class="food-body text-center">
                            <h3 class="food-title">Street Food</h3>
                            <p class="food-text">
                                Vibrant street food culture.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hidden Gems Section -->
    <section id="gems" class="section-padding">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <div class="badge-custom">
                    <i class="bi bi-stars me-2"></i>
                    Off the Beaten Path
                </div>
                <h2 class="section-title">Hidden Gems</h2>
                <p class="section-subtitle">
                    Venture beyond the usual tourist spots and uncover the secret treasures that locals cherish.
                </p>
            </div>
            <div class="row g-4">
                <!-- Gem Card 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-right">
                    <div class="gem-card">
                        <div class="gem-image">
                            <img src="https://scontent.fbkk29-8.fna.fbcdn.net/v/t51.75761-15/483926062_18049112399257014_5427564625134995571_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHbw_FLuK0fX0vQLJBdmN3Qqn0T9oGqVtOqfRP2gapW06nVWlo2dp_U87NtJQMdi2-U4A2eETZFr2WT0w4lgTeH&_nc_ohc=eyVNDIDA7McQ7kNvwFMpDIN&_nc_oc=Adk0QCvPKNopWWlzdpQ7r325iT68knrTqA7_cokg3FqujJEZM_qdtk-pLyQvequz6BE&_nc_zt=23&_nc_ht=scontent.fbkk29-8.fna&_nc_gid=cwGbH8Lp9oITrFbHB4NYnA&oh=00_Afp_o1clgkR_anGGbB3Mc30qnm8zS0nHGu4TNgHR8Xq-fg&oe=69693C75" 
                                 alt="Hinghoy Harmony - หิ่งห้อย ฮาร์โมนี่ ">
                            <div class="gem-overlay">
                                <h3 class="gem-title">Hinghoy Harmony - หิ่งห้อย ฮาร์โมนี่ </h3>
                                <div class="gem-location">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Pak Kret District - ปากเกร็ด
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gem Card 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="gem-card">
                        <div class="gem-image">
                            <img src="https://cms.dmpcdn.com/travel/2023/07/31/b75eca80-2f61-11ee-974a-755aac0b81f7_webp_original.webp" 
                                 alt="Wat Saphan Sung">
                            <div class="gem-overlay">
                                <h3 class="gem-title">Wat Saphan Sung วัดสพานสูง</h3>
                                <div class="gem-location">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Pak Kret District - ปากเกร็ด
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gem Card 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-left">
                    <div class="gem-card">
                        <div class="gem-image">
                            <img src="https://img.wongnai.com/p/400x0/2021/05/11/3ef86d4a4e8b4826a0db288b2e70bb16.jpg" 
                                 alt="NAP'S COFFEE x PAK KRET">
                            <div class="gem-overlay">
                                <h3 class="gem-title">NAP'S COFFEE x PAK KRET</h3>
                                <div class="gem-location">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    Pak Kret District - ปากเกร็ด
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding py-0">
        <div class="container">
            <div class="cta-wrapper text-center text-white" data-aos="zoom-out">
                <h2 class="display-4 fw-bold mb-4">Ready to Explore Khlong Phra Udom?</h2>
                <p class="fs-5 mb-5 opacity-75">
                    Start planning your journey to this peaceful riverside community today.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="https://www.google.com/maps/" target="_blank" class="btn btn-light btn-lg px-5 rounded-pill">Get Directions</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg px-5 rounded-pill">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-5">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="brand-icon">
                            <i class="bi bi-stars"></i>
                        </div>
                        <div>
                            <div class="brand-title">คลองพระอุดม</div>
                            <div class="brand-subtitle">อำเภอปากเกร็ด จังหวัดนนทบุรี</div>
                        </div>
                    </div>
                    <p class="text-muted">
                        ค้นพบเสน่ห์อันเป็นเอกลักษณ์ของอำเภอปากเกร็ดในประเทศไทย ที่ซึ่งประเพณีและความสงบสุขผสานกันสร้างประสบการณ์ที่ยากจะลืมเลือน
                    </p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-4">Quick Links</h5>
                    <ul class="list-unstyled d-grid gap-2">
                        <li><a href="#highlights" class="text-decoration-none text-muted hover-primary">Highlights</a></li>
                        <li><a href="#food" class="text-decoration-none text-muted hover-primary">Local Food</a></li>
                        <li><a href="#gems" class="text-decoration-none text-muted hover-primary">Hidden Gems</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-4">Newsletter</h5>
                    <p class="text-muted mb-4 small">Subscribe for travel tips and deals.</p>
                    <div class="input-group">
                        <input type="email" class="form-control border-0 bg-white" placeholder="Email">
                        <button class="btn btn-primary-custom">Send</button>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p class="mb-0">© 2026 Khlong Phra Udom Tourism. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
