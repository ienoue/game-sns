require('./bootstrap');
import { Modal, Popover } from "bootstrap";
window.Modal = Modal;
window.Popover = Popover;
window.Tagify = require('@yaireo/tagify');

require('./ajaxSetup');
require('./tag');
require('./editPost');
require('./like');
require('./follow');
require('./partner');
require('./disableSubmit');
require('./battle');