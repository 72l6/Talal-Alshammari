CREATE TABLE IF NOT EXISTS profile_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_type VARCHAR(50),
    title VARCHAR(255),
    content TEXT,
    sort_order INT
);

INSERT INTO profile_data (section_type, title, content, sort_order) VALUES
('big', 'TALAL', '', 1),
('card', 'BIOGRAPHY', 'Software Engineering student at University of Hail. Passionate about AI integration, Web Development, and Software Quality.', 2),
('card', 'SKILLS', 'HTML5, CSS3, JavaScript, UI/UX Design, Software Modeling, SonarQube, AI Applications.', 3),
('big', 'TRAINING', '', 4),
('card', 'KAUST ACADEMY', 'Active participant in the AI, Business Intelligence, and Sustainability (AI/BI/SUS) program (2025/2026).', 5),
('card', 'HAIL INTEL WORKSHOP', 'Participated in specialized workshops focusing on regional intelligence and AI applications in Hail.', 6),
('big', 'EXPERIENCE', '', 7),
('card', 'MEDICAL RESEARCH', 'Conducted specialized research in Medical Terminology (Cardiovascular System) focusing on data accuracy and modeling.', 8),
('card', 'SMART CITIES', 'Researching AI frameworks for urban development in line with Saudi Vision 2030 and NEOM goals.', 9),
('big', 'WORKS', '', 10),
('card', 'CLINIC SYSTEM', 'A digital appointment platform designed for university clinics with a focus on UX.', 11),
('card', 'STOCHASTIC SIM', 'Modeling software development lifecycles to predict task durations and efficiency using Insight Maker.', 12);
