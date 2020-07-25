import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import momentPlugin from '@fullcalendar/moment';
import {moment} from '@fullcalendar/moment';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';
import interactionPlugin from '@fullcalendar/interaction';
import timelinePlugin from '@fullcalendar/timeline';
import timeGridPlugin from '@fullcalendar/timegrid';

window.Calendar = Calendar
window.dayGridPlugin = dayGridPlugin
window.momentPlugin = momentPlugin
window.momentTimezonePlugin = momentTimezonePlugin
window.timelinePlugin = timelinePlugin
window.timeGridPlugin = timeGridPlugin
window.interactionPlugin = interactionPlugin
window.moment = moment
