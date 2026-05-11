CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE profile_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_type VARCHAR(50),
    title VARCHAR(255),
    body TEXT,
    text_val VARCHAR(255)
);

INSERT INTO profile_data (item_type, title, body, text_val) VALUES
('big', '', '', 'TALAL'),
('card', 'BIOGRAPHY', 'Software Engineering student at University of Hail. Passionate about AI integration, Web Development, and Software Quality.', ''),
('card', 'SKILLS', 'HTML5, CSS3, JavaScript, UI/UX Design, Software Modeling, SonarQube, AI Applications.', ''),
('big', '', '', 'TRAINING'),
('card', 'KAUST ACADEMY', 'Active participant in the AI, Business Intelligence, and Sustainability (AI/BI/SUS) program (2025/2026).', ''),
('card', 'HAIL INTEL WORKSHOP', 'Participated in specialized workshops focusing on regional intelligence and AI applications in Hail.', ''),
('big', '', '', 'EXPERIENCE'),
('card', 'MEDICAL RESEARCH', 'Conducted specialized research in Medical Terminology (Cardiovascular System) focusing on data accuracy and modeling.', ''),
('card', 'SMART CITIES', 'Researching AI frameworks for urban development in line with Saudi Vision 2030 and NEOM goals.', ''),
('big', '', '', 'WORKS'),
('card', 'CLINIC SYSTEM', 'A digital appointment platform designed for university clinics with a focus on UX.', ''),
('card', 'STOCHASTIC SIM', 'Modeling software development lifecycles to predict task durations and efficiency using Insight Maker.', ''),
('big', '', '', 'CONTACT'),
('card', 'GET IN TOUCH', '<form action="index.php" method="POST" style="display:flex;flex-direction:column;gap:10px;"><input type="text" name="name" placeholder="Name" required style="background:transparent;border:1px solid var(--accent);color:#fff;padding:8px;font-family:var(--font-code);"><input type="email" name="email" placeholder="Email" required style="background:transparent;border:1px solid var(--accent);color:#fff;padding:8px;font-family:var(--font-code);"><textarea name="msg" placeholder="Message" required style="background:transparent;border:1px solid var(--accent);color:#fff;padding:8px;font-family:var(--font-code);height:60px;"></textarea><button type="submit" style="background:var(--accent);color:#000;border:none;padding:8px;font-weight:bold;cursor:pointer;font-family:var(--font-display);">SEND</button></form>', '');
