

    // Loading screen animation
    window.addEventListener('load', () => {
        setTimeout(() => {
            document.querySelector('.loading-screen').style.opacity = 0;
            setTimeout(() => {
                document.querySelector('.loading-screen').style.display = 'none';
                
                // Animate hero content after loading
                gsap.to('.hero-title', { opacity: 1, y: 0, duration: 1, delay: 0.3 });
                gsap.to('.hero-subtitle', { opacity: 1, y: 0, duration: 1, delay: 0.6 });
                gsap.to('.hero-buttons', { opacity: 1, y: 0, duration: 1, delay: 0.9 });
            }, 500);
        }, 1500);
    });
    
    // Three.js background animation
    const initThreeJS = () => {
        const canvas = document.createElement('canvas');
        document.querySelector('.canvas-container').appendChild(canvas);
        
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        
        const renderer = new THREE.WebGLRenderer({
            canvas: canvas,
            antialias: true,
            alpha: true
        });
        renderer.setSize(window.innerWidth, window.innerHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        
        // Particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 1500;
        
        const posArray = new Float32Array(particlesCount * 3);
        const colors = new Float32Array(particlesCount * 3);
        
        const googleColors = [
            [0.26, 0.52, 0.96], // Blue
            [0.92, 0.26, 0.21], // Red
            [0.98, 0.73, 0.02], // Yellow
            [0.20, 0.66, 0.33]  // Green
        ];
        
        for(let i = 0; i < particlesCount * 3; i += 3) {
            // Positions
            posArray[i] = (Math.random() - 0.5) * 5;
            posArray[i+1] = (Math.random() - 0.5) * 5;
            posArray[i+2] = (Math.random() - 0.3) * 5;
            
            // Colors
            const colorIndex = Math.floor(Math.random() * 4);
            colors[i] = googleColors[colorIndex][0];
            colors[i+1] = googleColors[colorIndex][1];
            colors[i+2] = googleColors[colorIndex][2];
        }
        
        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        particlesGeometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
        
        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.01,
            vertexColors: true,
            transparent: true,
            sizeAttenuation: true
        });
        
        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);
        
        camera.position.z = 2;
        
        // Mouse effect
        let mouseX = 0;
        let mouseY = 0;
        
        document.addEventListener('mousemove', (event) => {
            mouseX = (event.clientX / window.innerWidth) * 2 - 1;
            mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
        });
        
        // Animation
        const animate = () => {
            requestAnimationFrame(animate);
            
            particlesMesh.rotation.x += 0.001;
            particlesMesh.rotation.y += 0.001;
            
            // Responsive to mouse
            particlesMesh.rotation.x += mouseY * 0.001;
            particlesMesh.rotation.y += mouseX * 0.001;
            
            renderer.render(scene, camera);
        };
        
        animate();
        
        // Handle resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
    };
    
    // Initialize Three.js
    initThreeJS();
    
    // Scroll animations
    const scrollReveal = () => {
        const elements = document.querySelectorAll('.fade-up, .fade-left, .fade-right');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, { threshold: 0.1 });
        
        elements.forEach(element => {
            observer.observe(element);
        });
    };
    
    // Initialize scroll reveal
    scrollReveal();
    
    // Handle header changes on scroll
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        const scrollToTopBtn = document.querySelector('.scroll-to-top');
        
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
            scrollToTopBtn.classList.add('show');
        } else {
            header.classList.remove('scrolled');
            scrollToTopBtn.classList.remove('show');
        }
    });
    
    // Scroll to top button
    document.querySelector('.scroll-to-top').addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Smooth scrolling for navigation
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            window.scrollTo({
                top: targetElement.offsetTop - 70,
                behavior: 'smooth'
            });
        });
    });
    
  






    // Team reveal functionality
document.addEventListener('DOMContentLoaded', () => {
    // Get all team cards
    const teamCards = document.querySelectorAll('.team-card');
    
    // Add click event to each team card
    teamCards.forEach(card => {
        card.addEventListener('click', () => {
            // Toggle expanded class on the clicked card
            card.classList.toggle('expanded');
            
            // Optional: Close other cards when one is opened
            teamCards.forEach(otherCard => {
                if (otherCard !== card && otherCard.classList.contains('expanded')) {
                    otherCard.classList.remove('expanded');
                }
            });
        });
    });
    
    // Year filter functionality
    const yearFilters = document.querySelectorAll('.year-filter');
    const allTeamCards = document.querySelectorAll('.team-card');
    
    yearFilters.forEach(filter => {
        filter.addEventListener('click', () => {
            // Remove active class from all filters
            yearFilters.forEach(f => f.classList.remove('active'));
            
            // Add active class to clicked filter
            filter.classList.add('active');
            
            // Get selected year
            const selectedYear = filter.getAttribute('data-year');
            
            // Show/hide team members based on year
            allTeamCards.forEach(card => {
                const cardYear = card.getAttribute('data-year');
                
                if (selectedYear === 'all' || cardYear === selectedYear) {
                    card.style.display = 'block';
                    // Add animation for appearing cards
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Animate team section on scroll
    const animateTeamSection = () => {
        const teamSection = document.querySelector('.team-section');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    teamSection.style.opacity = '1';
                    teamSection.style.transform = 'translateY(0)';
                    
                    // Stagger animation for team cards
                    teamCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100 * index);
                    });
                    
                    // Stop observing after animation
                    observer.unobserve(teamSection);
                }
            });
        }, { threshold: 0.2 });
        
        if (teamSection) {
            observer.observe(teamSection);
        }
    };
    
    // Initialize animations
    animateTeamSection();
    
    // Color cycling animation for specific elements (optional)
    const colorCycleElements = document.querySelectorAll('.color-cycle');
    
    colorCycleElements.forEach(element => {
        element.style.animation = 'colorCycle 10s infinite';
    });
});












// Function to check and create missing elements
function ensureTeamElementsExist() {
    // Check if team section exists, if not, create it
    let teamSection = document.querySelector('.team-section');
    if (!teamSection) {
        console.log('Creating missing team section');
        teamSection = document.createElement('div');
        teamSection.className = 'team-section';
        document.body.appendChild(teamSection);
    }
    
    // Make sure team section is visible
    teamSection.style.opacity = '1';
    teamSection.style.transform = 'translateY(0)';
    
    // Check if there are any team cards
    const teamCards = document.querySelectorAll('.team-card');
    if (teamCards.length === 0) {
        console.log('No team cards found. Please ensure your HTML includes team cards with class "team-card"');
    } else {
        // Make sure each team card has the necessary structure
        teamCards.forEach(card => {
            // Ensure initial visibility
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
            
            // Check if card has member-content
            if (!card.querySelector('.member-content')) {
                console.log('Team card missing member-content class element');
            }
            
            // Check if the card has a data-year attribute
            if (!card.hasAttribute('data-year')) {
                console.log('Adding missing data-year attribute to team card');
                card.setAttribute('data-year', 'all');
            }
        });
    }
    
    // Check if there are year filters
    const yearFilters = document.querySelectorAll('.year-filter');
    if (yearFilters.length === 0) {
        console.log('No year filters found. Year filtering will not work.');
    }
}

// Check if any elements are hidden by CSS
function checkVisibility() {
    // Check team section visibility
    const teamSection = document.querySelector('.team-section');
    if (teamSection) {
        const teamSectionStyle = window.getComputedStyle(teamSection);
        if (teamSectionStyle.display === 'none' || teamSectionStyle.visibility === 'hidden') {
            console.log('Team section is hidden by CSS');
            teamSection.style.display = 'block';
            teamSection.style.visibility = 'visible';
        }
    }
    
    // Check team cards visibility
    const teamCards = document.querySelectorAll('.team-card');
    teamCards.forEach(card => {
        const cardStyle = window.getComputedStyle(card);
        if (cardStyle.display === 'none' || cardStyle.visibility === 'hidden') {
            console.log('Team card is hidden by CSS');
            card.style.display = 'block';
            card.style.visibility = 'visible';
        }
        
        // Reset height to ensure content is visible
        card.style.height = 'auto';
    });
}

// Fix for team reveal functionality
document.addEventListener('DOMContentLoaded', () => {
    // Wait a bit to ensure all elements are loaded and processed
    setTimeout(() => {
        console.log('Running team display fix');
        
        // Make sure elements exist and are structured correctly
        ensureTeamElementsExist();
        
        // Check if elements are hidden by CSS
        checkVisibility();
        
        // Get all team cards (again, in case they were just created)
        const teamCards = document.querySelectorAll('.team-card');
        
        // Debug information
        console.log(`Found ${teamCards.length} team cards`);
        
        // Force team cards to be visible regardless of CSS
        teamCards.forEach(card => {
            card.style.display = 'block';
            
            // Make sure we can see content even if card is in initial state
            const memberContent = card.querySelector('.member-content');
            if (memberContent) {
                memberContent.style.maxHeight = 'none';
                memberContent.style.opacity = '1';
            }
            
            // Add click event (will override if already exists)
            card.addEventListener('click', () => {
                console.log('Team card clicked');
                card.classList.toggle('expanded');
                
                // Force content visibility if expanded
                if (card.classList.contains('expanded')) {
                    const memberContent = card.querySelector('.member-content');
                    if (memberContent) {
                        memberContent.style.maxHeight = 'none';
                        memberContent.style.opacity = '1';
                    }
                    
                    const hiddenContent = card.querySelector('.hidden-content');
                    if (hiddenContent) {
                        hiddenContent.style.maxHeight = 'none';
                        hiddenContent.style.opacity = '1';
                    }
                }
            });
        });
        
        // Debug message to verify script execution
        console.log('Team display fix completed');
    }, 1000); // Wait 1 second after DOM is ready
});

// Add this script to the bottom of your page to ensure it runs after everything else
window.addEventListener('load', () => {
    setTimeout(() => {
        // Final check after everything has loaded
        checkVisibility();
        
        // Force team section to be visible
        const teamSection = document.querySelector('.team-section');
        if (teamSection) {
            teamSection.style.opacity = '1';
            teamSection.style.transform = 'translateY(0)';
        }
        
        // Force all team cards to be visible
        const teamCards = document.querySelectorAll('.team-card');
        teamCards.forEach((card, index) => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        });
        
        console.log('Final visibility check completed');
    }, 2000);
});
   
   



    
