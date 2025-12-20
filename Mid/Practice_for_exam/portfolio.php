<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Required Metadata -->
    <meta name="author" content="Alex Doe">
    <meta name="description" content="Personal Portfolio of Alex Doe, a Computer Science student seeking internship opportunities.">
    <meta name="keywords" content="Portfolio, Computer Science, Internship, Web Development, Student, Resume">
    
    <title>Alex Doe | CS Student Portfolio</title>

    <!-- Font Awesome for Icons (Keeping this for professional look) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* CSS Reset and Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb; /* bg-gray-50 */
            color: #374151; /* text-gray-800 */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            scroll-behavior: smooth;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem; /* px-6 */
        }

        /* Header Styling */
        header {
            background-color: #4f46e5; /* bg-indigo-600 */
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow-lg */
            position: sticky;
            top: 0;
            z-index: 50;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem; /* py-4 */
            padding-bottom: 1rem; /* py-4 */
        }

        header h1 {
            font-size: 1.5rem; /* text-2xl */
            font-weight: bold;
            letter-spacing: 0.05em; /* tracking-wide */
        }

        header p {
            font-size: 0.75rem; /* text-xs */
            color: #a5b4fc; /* text-indigo-200 */
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem; /* space-x-6 */
            font-size: 0.875rem; /* text-sm */
            font-weight: 500;
        }

        nav a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #a5b4fc; /* hover:text-indigo-200 */
        }

        /* Main Content Styling */
        main {
            flex-grow: 1;
            padding-top: 2.5rem; /* py-10 */
            padding-bottom: 2.5rem; /* py-10 */
        }
        
        main .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 4rem; /* space-y-16 */
        }

        section {
            background-color: white;
            border-radius: 0.5rem; /* rounded-lg */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-md */
            padding: 2rem; /* p-8 */
        }

        h2 {
            font-size: 1.875rem; /* text-3xl */
            font-weight: bold;
            color: #4338ca; /* text-indigo-700 */
            margin-bottom: 1.5rem; /* mb-6 */
            padding-bottom: 0.5rem; /* pb-2 */
            border-bottom: 1px solid #e0e7ff; /* border-b border-indigo-100 */
        }

        /* About Section */
        #about-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem; /* gap-8 */
        }
        
        #about .profile-image {
            width: 8rem; /* w-32 */
            height: 8rem; /* h-32 */
            flex-shrink: 0;
            background-color: #eef2ff; /* bg-indigo-100 */
            border-radius: 9999px; /* rounded-full */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a5b4fc; /* text-indigo-300 */
        }

        #about .profile-image i {
            font-size: 3.75rem; /* text-6xl */
        }

        #about p {
            font-size: 1.125rem; /* text-lg */
            line-height: 1.625; /* leading-relaxed */
            color: #4b5563; /* text-gray-600 */
            margin-bottom: 1rem; /* mb-4 */
        }

        /* Education Table */
        #education table {
            width: 100%;
            text-align: left;
            border-collapse: collapse;
        }
        
        #education .table-header {
            background-color: #eef2ff; /* bg-indigo-50 */
            color: #3730a3; /* text-indigo-800 */
            text-transform: uppercase;
            font-size: 0.875rem; /* text-sm */
            line-height: 1.5; /* leading-normal */
        }
        
        #education th, #education td {
            padding: 0.75rem 1.5rem; /* py-3 px-6 */
            border-bottom: 2px solid #c7d2fe; /* border-b-2 border-indigo-200 */
        }

        #education tbody {
            font-size: 0.875rem; /* text-sm */
            font-weight: 300; /* font-light */
        }

        #education tbody tr {
            border-bottom: 1px solid #e5e7eb; /* border-b border-gray-200 */
            transition: background-color 0.3s ease;
        }
        
        #education tbody tr:hover {
            background-color: #f9fafb; /* hover:bg-gray-50 */
        }

        #education tbody td {
            color: #4b5563; /* text-gray-600 */
        }

        #education tbody td:first-child {
            font-weight: 500; /* font-medium */
            color: #374151; /* text-gray-800 */
        }

        /* Contact Form */
        #contact {
            max-width: 42rem; /* max-w-2xl */
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        #contact p {
            text-align: center;
            color: #6b7280; /* text-gray-500 */
            margin-bottom: 2rem; /* mb-8 */
        }
        
        #contact form {
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 1.5rem; /* space-y-6 */
        }

        #contact label {
            display: block;
            font-size: 0.875rem; /* text-sm */
            font-weight: 500;
            color: #374151; /* text-gray-700 */
            margin-bottom: 0.25rem; /* mb-1 */
        }

        #contact input[type="text"],
        #contact input[type="email"],
        #contact textarea {
            width: 100%;
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border: 1px solid #d1d5db; /* border border-gray-300 */
            border-radius: 0.375rem; /* rounded-md */
            transition: all 0.2s ease;
            outline: none;
        }

        #contact input:focus,
        #contact textarea:focus {
            border-color: #4f46e5; /* focus:border-indigo-500 */
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.5); /* focus:ring-2 focus:ring-indigo-500 */
        }

        #contact textarea {
            resize: vertical;
        }

        #contact button {
            width: 100%;
            background-color: #4f46e5; /* bg-indigo-600 */
            color: white;
            font-weight: bold;
            padding: 0.75rem 1rem; /* py-3 px-4 */
            border-radius: 0.375rem; /* rounded-md */
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow-md */
        }

        #contact button:hover {
            background-color: #4338ca; /* hover:bg-indigo-700 */
        }
        
        #contact button:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.5); /* focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 */
        }

        /* Footer Styling */
        footer {
            background-color: #1f2937; /* bg-gray-800 */
            color: white;
            padding-top: 2rem; /* py-8 */
            padding-bottom: 2rem; /* py-8 */
            margin-top: auto;
        }

        footer .container {
            text-align: center;
        }

        footer p {
            margin-bottom: 1rem; /* mb-4 */
        }

        footer .social-links a {
            color: #9ca3af; /* text-gray-400 */
            margin: 0 0.75rem; /* space-x-6 (distributed) */
            transition: color 0.3s ease;
        }

        footer .social-links a:hover {
            color: white;
        }

        /* Responsive Adjustments (Mobile first, then MD breakpoint) */
        @media (min-width: 768px) {
            /* Adjustments for medium screens (md) and up */
            
            #about-content {
                flex-direction: row;
                text-align: left;
            }
            
            #about .profile-image {
                width: 12rem; /* md:w-48 */
                height: 12rem; /* md:h-48 */
            }

            h2 {
                font-size: 2.25rem; /* Tweak size for desktop */
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="container">
            <!-- Name / Logo -->
            <div>
                <h1>Alex Doe</h1>
                <p>Computer Science Student</p>
            </div>

            <!-- Navigation Bar -->
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#education">Education</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="content-wrapper">

            <!-- Biography Section -->
            <section id="about">
                <h2>About Me</h2>
                <div id="about-content">
                    <!-- Placeholder for Image -->
                    <div class="profile-image">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <p>
                            Hello! I am a passionate Computer Science student currently in my junior year. 
                            I have a strong foundation in algorithms and data structures, and I love building web applications 
                            that solve real-world problems.
                        </p>
                        <p>
                            I am currently looking for an internship opportunity where I can apply my skills in 
                            <strong>HTML5, CSS3, JavaScript, and Python</strong> while learning from experienced professionals. 
                            When I'm not coding, you can find me hiking or participating in hackathons.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Education Section (Table) -->
            <section id="education">
                <h2>Education</h2>
                <div class="overflow-x-auto">
                    <table>
                        <thead>
                            <tr class="table-header">
                                <th>Qualification</th>
                                <th>Institution</th>
                                <th>Year</th>
                                <th>Result/GPA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>B.Sc. in Computer Science</td>
                                <td>Tech University</td>
                                <td>2022 - Present</td>
                                <td>3.8 / 4.0 (Current)</td>
                            </tr>
                            <tr>
                                <td>Higher Secondary Certificate</td>
                                <td>City College</td>
                                <td>2020 - 2022</td>
                                <td>5.00 / 5.00</td>
                            </tr>
                            <tr>
                                <td>Secondary School Certificate</td>
                                <td>City High School</td>
                                <td>2015 - 2020</td>
                                <td>5.00 / 5.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Contact Section (Form) -->
            <section id="contact">
                <h2>Get In Touch</h2>
                <p>Have an internship opportunity or just want to say hi? Fill out the form below!</p>
                
                <form action="#" method="POST">
                    <!-- Name Input -->
                    <div>
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Smith" required>
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="john@example.com" required>
                    </div>

                    <!-- Message Textarea -->
                    <div>
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="4" placeholder="Your message here..." required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit">
                        Send Message
                    </button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2023 Alex Doe. All rights reserved.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-github fa-lg"></i></a>
                <a href="#"><i class="fab fa-linkedin fa-lg"></i></a>
                <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
            </div>
        </div>
    </footer>

</body>
</html>