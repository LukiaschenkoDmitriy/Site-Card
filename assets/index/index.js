import "./home/home.scss";
import './resume/resume.scss';
import './about/about.scss';
import "./skills/skills.scss";

import { homeInit } from "./home/home";
import { skillsInit } from "./skills/skills";
import { resumeInit } from "./resume/resume";
import { aboutInit } from "./about/about";

homeInit();
skillsInit();
resumeInit();
aboutInit();