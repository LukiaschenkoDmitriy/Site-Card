import "animate.css";
import "wowjs";

import "./home/home.scss";
import './resume/resume.scss';
import './about/about.scss';
import "./skills/skills.scss";
import "./project/project.scss";
import "./footer/footer.scss";

import { homeInit } from "./home/home";
import { skillsInit } from "./skills/skills";
import { resumeInit } from "./resume/resume";
import { aboutInit } from "./about/about";

homeInit();
skillsInit();
resumeInit();
aboutInit();