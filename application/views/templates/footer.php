            </div> <!-- Close .container -->
        </main>
        
        <footer style="text-align: center; padding: 40px; color: var(--text-muted); font-size: 13px;">
            &copy; <?php echo date('Y'); ?> GAIL TRAINING INSTITUTE, NOIDA. All Rights Reserved.
        </footer>
    </div> <!-- Close .main-wrapper -->

    <script>
        // Mobile Toggle Script
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        
        if (navToggle) {
            navToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                navToggle.classList.toggle('active');
            });
        }
    </script>
</body>
</html>
