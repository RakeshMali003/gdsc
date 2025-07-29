<?php
include('./header.php');

?>

  
  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <section class="mb-16 team-section" id="intro-section">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gdg mb-4">Meet Our Amazing Team</h2>
        <p class="text-lg max-w-2xl mx-auto">Passionate developers, designers, and tech enthusiasts working together to build a thriving tech community.</p>
      </div>
      
      <!-- Year Filter -->
      <div class="flex justify-center gap-4 mb-12">
        <div class="year-filter active" data-year="all">All Years</div>
        <div class="year-filter" data-year="2025">2025</div>
        <div class="year-filter" data-year="2024">2024</div>
        <div class="year-filter" data-year="2023">2023</div>
      </div>
    </section>
    
    <!-- Faculty Coordinator -->
    <section class="mb-16 team-section" id="faculty-section">
      <h2 class="text-2xl font-bold mb-6 text-gdg">Faculty Coordinator</h2>
      <div class="team-card p-6" id="faculty-card">
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
              <img src="/api/placeholder/100/100" alt="Faculty" class="w-full h-full object-cover">
            </div>
            <div>
              <h3 class="font-bold">Dr. Jane Smith</h3>
              <p class="text-sm text-gray-400">Faculty Coordinator</p>
            </div>
          </div>
          <div class="transform transition-transform duration-300 card-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
        <div class="hidden-content mt-6">
          <p class="mb-4">Leading our GDG community with passion and expertise in Computer Science and AI research.</p>
          <div class="flex gap-4 mt-4">
            <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
            <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
            <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- GDG Lead -->
    <section class="mb-16 team-section" id="gdg-lead-section">
      <h2 class="text-2xl font-bold mb-6 text-gdg">GDG Lead</h2>
      <div class="team-card p-6" id="gdg-lead-card">
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
              <img src="/api/placeholder/100/100" alt="GDG Lead" class="w-full h-full object-cover">
            </div>
            <div>
              <h3 class="font-bold">Alex Johnson</h3>
              <p class="text-sm text-gray-400">GDG Lead</p>
            </div>
          </div>
          <div class="transform transition-transform duration-300 card-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
        <div class="hidden-content mt-6">
          <p class="mb-4">Passionate about Google technologies and community building. Leads our GDG chapter with innovative ideas and technical expertise.</p>
          <div class="flex gap-4 mt-4">
            <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
            <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
            <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Executive Team -->
    <section class="mb-16 team-section" id="executive-section">
      <h2 class="text-2xl font-bold mb-6 text-gdg">Executive Team</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Executive Member 1 -->
        <div class="team-card p-6" data-year="2025">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Executive" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Michael Brown</h3>
                <p class="text-sm text-gray-400">General Secretary</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Coordinates all club activities and ensures smooth functioning of operations.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Executive Member 2 -->
        <div class="team-card p-6" data-year="2025">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Executive" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Emma Wilson</h3>
                <p class="text-sm text-gray-400">Treasurer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Manages club finances and budget planning for various events and activities.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Executive Member 3 -->
        <div class="team-card p-6" data-year="2024">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Executive" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">David Chen</h3>
                <p class="text-sm text-gray-400">Vice President</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Assists the GDG Lead in strategic planning and represents the club at various forums.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Web Development Team -->
    <section class="mb-16 team-section" id="web-dev-section">
      <h2 class="text-2xl font-bold mb-6 text-gdg">Web Development Team</h2>
      
      <!-- Team Lead -->
      <div class="team-card p-6 mb-6" data-year="2025">
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
              <img src="/api/placeholder/100/100" alt="Web Dev Lead" class="w-full h-full object-cover">
            </div>
            <div>
              <h3 class="font-bold">Sophia Lee</h3>
              <p class="text-sm text-gray-400">Web Development Lead</p>
            </div>
          </div>
          <div class="transform transition-transform duration-300 card-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>
        <div class="hidden-content mt-6">
          <p class="mb-4">Full-stack developer specializing in React and Node.js. Leads our web development initiatives.</p>
          <div class="flex gap-4 mt-4">
            <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
            <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
            <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
          </div>
        </div>
      </div>
      
      <!-- Core Members -->
      <h3 class="text-xl font-semibold mb-4 text-gray-300">Core Members</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Core Member 1 -->
        <div class="team-card p-6" data-year="2025">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Ryan Park</h3>
                <p class="text-sm text-gray-400">Frontend Developer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Specializes in creating interactive UIs with React and Next.js.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Core Member 2 -->
        <div class="team-card p-6" data-year="2024">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Olivia Martinez</h3>
                <p class="text-sm text-gray-400">Backend Developer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Expert in Node.js, Express, and MongoDB for powerful backend solutions.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Core Member 3 -->
        <div class="team-card p-6" data-year="2025">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Aiden Taylor</h3>
                <p class="text-sm text-gray-400">DevOps Engineer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <p class="mb-4">Manages cloud infrastructure and CI/CD pipelines for our projects.</p>
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Team Members -->
      <h3 class="text-xl font-semibold mb-4 text-gray-300">Team Members</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Member 1 -->
        <div class="team-card p-6" data-year="2025">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Jake Miller</h3>
                <p class="text-sm text-gray-400">Web Developer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Additional Web Dev Team Members... (similar structure) -->
        <!-- Member 2 -->
        <div class="team-card p-6" data-year="2024">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Sophie Wang</h3>
                <p class="text-sm text-gray-400">Web Developer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Member 3 -->
        <div class="team-card p-6" data-year="2023">
          <div class="flex justify-between items-center">
            <div class="flex items-center">
              <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
                <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
              </div>
              <div>
                <h3 class="font-bold">Lucas Garcia</h3>
                <p class="text-sm text-gray-400">Web Developer</p>
              </div>
            </div>
            <div class="transform transition-transform duration-300 card-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div class="hidden-content mt-6">
            <div class="flex gap-4 mt-4">
              <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
              <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
              <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
            </div>
          </div>
        </div>
        <div class="team-card p-6" data-year="2025">
  <div class="flex justify-between items-center">
    <div class="flex items-center">
      <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
        <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
      </div>
      <div>
        <h3 class="font-bold">Mia Rodriguez</h3>
        <p class="text-sm text-gray-400">Web Developer</p>
      </div>
    </div>
    <div class="transform transition-transform duration-300 card-arrow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
  <div class="hidden-content mt-6">
    <div class="flex gap-4 mt-4">
      <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
      <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
      <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
    </div>
  </div>
</div>

<!-- Member 5 -->
<div class="team-card p-6" data-year="2024">
  <div class="flex justify-between items-center">
    <div class="flex items-center">
      <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
        <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
      </div>
      <div>
        <h3 class="font-bold">Tyler Adams</h3>
        <p class="text-sm text-gray-400">Web Developer</p>
      </div>
    </div>
    <div class="transform transition-transform duration-300 card-arrow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
  <div class="hidden-content mt-6">
    <div class="flex gap-4 mt-4">
      <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
      <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
      <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
    </div>
  </div>
</div>
</div>
</section>

<!-- Design Team -->
<section class="mb-16 team-section" id="design-section">
<h2 class="text-2xl font-bold mb-6 text-gdg">Design Team</h2>

<!-- Team Lead -->
<div class="team-card p-6 mb-6" data-year="2025">
  <div class="flex justify-between items-center">
    <div class="flex items-center">
      <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
        <img src="/api/placeholder/100/100" alt="Design Lead" class="w-full h-full object-cover">
      </div>
      <div>
        <h3 class="font-bold">Ethan Cooper</h3>
        <p class="text-sm text-gray-400">Design Lead</p>
      </div>
    </div>
    <div class="transform transition-transform duration-300 card-arrow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
  <div class="hidden-content mt-6">
    <p class="mb-4">Creative director with expertise in UI/UX design and brand identity development.</p>
    <div class="flex gap-4 mt-4">
      <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
      <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
      <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
    </div>
  </div>
</div>

<!-- Core Members -->
<h3 class="text-xl font-semibold mb-4 text-gray-300">Core Members</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
  <!-- Core Member 1 -->
  <div class="team-card p-6" data-year="2025">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Isabella Wong</h3>
          <p class="text-sm text-gray-400">UI/UX Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">Creates intuitive user experiences and beautiful interfaces for our digital products.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Core Member 2 -->
  <div class="team-card p-6" data-year="2024">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Noah Kim</h3>
          <p class="text-sm text-gray-400">Graphic Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">Creates visually stunning graphics for event promotions and social media.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Core Member 3 -->
  <div class="team-card p-6" data-year="2023">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Zoe Davis</h3>
          <p class="text-sm text-gray-400">Motion Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">Specializes in creating engaging animations and interactive experiences.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- Team Members -->
<h3 class="text-xl font-semibold mb-4 text-gray-300">Team Members</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
  <!-- Member 1 -->
  <div class="team-card p-6" data-year="2025">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Harper Thompson</h3>
          <p class="text-sm text-gray-400">Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Member 2 -->
  <div class="team-card p-6" data-year="2025">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Leo Scott</h3>
          <p class="text-sm text-gray-400">Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Member 3 -->
  <div class="team-card p-6" data-year="2024">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Maya Singh</h3>
          <p class="text-sm text-gray-400">Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Member 4 -->
  <div class="team-card p-6" data-year="2023">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Jordan Hayes</h3>
          <p class="text-sm text-gray-400">Designer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
</div>
</section>

<!-- Technical Team -->
<section class="mb-16 team-section" id="technical-section">
<h2 class="text-2xl font-bold mb-6 text-gdg">Technical Team</h2>

<!-- Team Lead -->
<div class="team-card p-6 mb-6" data-year="2025">
  <div class="flex justify-between items-center">
    <div class="flex items-center">
      <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
        <img src="/api/placeholder/100/100" alt="Technical Lead" class="w-full h-full object-cover">
      </div>
      <div>
        <h3 class="font-bold">Daniel Jackson</h3>
        <p class="text-sm text-gray-400">Technical Lead</p>
      </div>
    </div>
    <div class="transform transition-transform duration-300 card-arrow">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </div>
  <div class="hidden-content mt-6">
    <p class="mb-4">Expert in machine learning and cloud technologies. Leads our technical workshops.</p>
    <div class="flex gap-4 mt-4">
      <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
      <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
      <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
    </div>
  </div>
</div>

<!-- Core Members -->
<h3 class="text-xl font-semibold mb-4 text-gray-300">Core Members</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
  <!-- Core Members for Technical Team (similar structure) -->
  <!-- Core Member 1 -->
  <div class="team-card p-6" data-year="2025">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Aria Foster</h3>
          <p class="text-sm text-gray-400">ML Engineer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">Specializes in deep learning and computer vision applications.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Core Member 2 -->
  <div class="team-card p-6" data-year="2024">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Elijah Brooks</h3>
          <p class="text-sm text-gray-400">Cloud Expert</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">GCP certified engineer focusing on cloud infrastructure and deployment.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Core Member 3 -->
  <div class="team-card p-6" data-year="2023">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Core Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Lily Patel</h3>
          <p class="text-sm text-gray-400">Android Developer</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <p class="mb-4">Kotlin enthusiast creating innovative Android applications with Jetpack Compose.</p>
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
</div>

<!-- Team Members -->
<h3 class="text-xl font-semibold mb-4 text-gray-300">Team Members</h3>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
  <!-- Technical Team Members... (similar structure) -->
  <!-- Team Member 1 -->
  <div class="team-card p-6" data-year="2025">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Isaac Wright</h3>
          <p class="text-sm text-gray-400">Technical Member</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  
  <!-- Team Member 2 -->
  <div class="team-card p-6" data-year="2024">
    <div class="flex justify-between items-center">
      <div class="flex items-center">
        <div class="avatar rounded-full overflow-hidden w-12 h-12 mr-4">
          <img src="/api/placeholder/100/100" alt="Team Member" class="w-full h-full object-cover">
        </div>
        <div>
          <h3 class="font-bold">Grace Robinson</h3>
          <p class="text-sm text-gray-400">Technical Member</p>
        </div>
      </div>
      <div class="transform transition-transform duration-300 card-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <div class="hidden-content mt-6">
      <div class="flex gap-4 mt-4">
        <a href="#" class="social-icon text-blue-400"><i class="fab fa-linkedin text-xl"></i></a>
        <a href="#" class="social-icon text-pink-500"><i class="fab fa-instagram text-xl"></i></a>
        <a href="#" class="social-icon text-gray-200"><i class="fab fa-github text-xl"></i></a>
      </div>
    </div>
  </div>
  


<?php
include('./footer.php');

?>