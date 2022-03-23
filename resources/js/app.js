require('./bootstrap');
import { Modal } from "bootstrap";
window.Modal = Modal;
window.Tagify = require('@yaireo/tagify');

require('./ajaxSetup');
require('./tag');
require('./editpost');