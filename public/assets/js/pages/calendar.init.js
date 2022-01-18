(()=>{"use strict";var e,o,n=[];function a(){this.id=null,this.name=null,this.checked=!0,this.color=null,this.bgColor=null,this.borderColor=null,this.dragBgColor=null}function t(e){n.push(e)}function r(e){var o;return n.forEach((function(n){n.id===e&&(o=n)})),o||n[0]}o=0,o+=1,(e=new a).id=String(o),e.name="My Calendar",e.color="#ffffff",e.bgColor="#556ee6",e.dragBgColor="#556ee6",e.borderColor="#556ee6",t(e),o+=1,(e=new a).id=String(o),e.name="Company",e.color="#ffffff",e.bgColor="#50a5f1",e.dragBgColor="#50a5f1",e.borderColor="#50a5f1",t(e),o+=1,(e=new a).id=String(o),e.name="Family",e.color="#ffffff",e.bgColor="#f46a6a",e.dragBgColor="#f46a6a",e.borderColor="#f46a6a",t(e),o+=1,(e=new a).id=String(o),e.name="Friend",e.color="#ffffff",e.bgColor="#34c38f",e.dragBgColor="#34c38f",e.borderColor="#34c38f",t(e),o+=1,(e=new a).id=String(o),e.name="Travel",e.color="#ffffff",e.bgColor="#bbdc00",e.dragBgColor="#bbdc00",e.borderColor="#bbdc00",t(e),o+=1,(e=new a).id=String(o),e.name="etc",e.color="#ffffff",e.bgColor="#9d9d9d",e.dragBgColor="#9d9d9d",e.borderColor="#9d9d9d",t(e),o+=1,(e=new a).id=String(o),e.name="Birthdays",e.color="#ffffff",e.bgColor="#f1b44c",e.dragBgColor="#f1b44c",e.borderColor="#f1b44c",t(e),o+=1,(e=new a).id=String(o),e.name="National Holidays",e.color="#ffffff",e.bgColor="#ff4040",e.dragBgColor="#ff4040",e.borderColor="#ff4040",t(e);var l,c,i=[],d=["milestone","task"];function s(){this.id=null,this.calendarId=null,this.title=null,this.body=null,this.isAllday=!1,this.start=null,this.end=null,this.category="",this.dueDateClass="",this.color=null,this.bgColor=null,this.dragBgColor=null,this.borderColor=null,this.customStyle="",this.isFocused=!1,this.isPending=!1,this.isVisible=!0,this.isReadOnly=!1,this.goingDuration=0,this.comingDuration=0,this.recurrenceRule="",this.state="",this.raw={memo:"",hasToOrCc:!1,hasRecurrenceRule:!1,location:null,class:"public",creator:{name:"",avatar:"",company:"",email:"",phone:""}}}function u(e,o,n){var a=new s;if(a.id=chance.guid(),a.calendarId=e.id,a.title=chance.sentence({words:3}),a.body=chance.bool({likelihood:20})?chance.sentence({words:10}):"",a.isReadOnly=chance.bool({likelihood:20}),function(e,o,n){var a=moment(o.getTime()),t=moment(n.getTime()),r=t.diff(a,"days");e.isAllday=chance.bool({likelihood:30}),e.isAllday?e.category="allday":chance.bool({likelihood:30})?(e.category=d[chance.integer({min:0,max:1})],e.category===d[1]&&(e.dueDateClass="morning")):e.category="time",a.add(chance.integer({min:0,max:r}),"days"),a.hours(chance.integer({min:0,max:23})),a.minutes(chance.bool()?0:30),e.start=a.toDate(),t=moment(a),e.isAllday&&t.add(chance.integer({min:0,max:3}),"days"),e.end=t.add(chance.integer({min:1,max:4}),"hour").toDate(),!e.isAllday&&chance.bool({likelihood:20})&&(e.goingDuration=chance.integer({min:30,max:120}),e.comingDuration=chance.integer({min:30,max:120}),chance.bool({likelihood:50})&&(e.end=e.start))}(a,o,n),a.isPrivate=chance.bool({likelihood:10}),a.location=chance.address(),a.attendees=chance.bool({likelihood:70})?function(){for(var e=[],o=0,n=chance.integer({min:1,max:10});o<n;o+=1)e.push(chance.name());return e}():[],a.recurrenceRule=chance.bool({likelihood:20})?"repeated events":"",a.state=chance.bool({likelihood:20})?"Free":"Busy",a.color=e.color,a.bgColor=e.bgColor,a.dragBgColor=e.dragBgColor,a.borderColor=e.borderColor,"milestone"===a.category&&(a.color=a.bgColor,a.bgColor="transparent",a.dragBgColor="transparent",a.borderColor="transparent"),a.raw.memo=chance.sentence(),a.raw.creator.name=chance.name(),a.raw.creator.avatar=chance.avatar(),a.raw.creator.company=chance.company(),a.raw.creator.email=chance.email(),a.raw.creator.phone=chance.phone(),chance.bool({likelihood:20})){var t=chance.minute();a.goingDuration=t,a.comingDuration=t}i.push(a)}!function(e,o){var a,t,l,c;function d(e,o){var n=[],a=moment(e.start.toUTCString());return o||n.push("<strong>"+a.format("HH:mm")+"</strong> "),e.isPrivate?(n.push('<span class="calendar-font-icon ic-lock-b"></span>'),n.push(" Private")):(e.isReadOnly?n.push('<span class="calendar-font-icon ic-readonly-b"></span>'):e.recurrenceRule?n.push('<span class="calendar-font-icon ic-repeat-b"></span>'):e.attendees.length?n.push('<span class="calendar-font-icon ic-user-b"></span>'):e.location&&n.push('<span class="calendar-font-icon ic-location-b"></span>'),n.push(" "+e.title)),n.join("")}function s(e){var o=$(e.target).closest('a[role="menuitem"]')[0],n=C(o),t=a.getOptions(),r="";switch(console.log(o),console.log(n),n){case"toggle-daily":r="day";break;case"toggle-weekly":r="week";break;case"toggle-monthly":t.month.visibleWeeksCount=0,r="month";break;case"toggle-weeks2":t.month.visibleWeeksCount=2,r="month";break;case"toggle-weeks3":t.month.visibleWeeksCount=3,r="month";break;case"toggle-narrow-weekend":t.month.narrowWeekend=!t.month.narrowWeekend,t.week.narrowWeekend=!t.week.narrowWeekend,r=a.getViewName(),o.querySelector("input").checked=t.month.narrowWeekend;break;case"toggle-start-day-1":t.month.startDayOfWeek=t.month.startDayOfWeek?0:1,t.week.startDayOfWeek=t.week.startDayOfWeek?0:1,r=a.getViewName(),o.querySelector("input").checked=t.month.startDayOfWeek;break;case"toggle-workweek":t.month.workweek=!t.month.workweek,t.week.workweek=!t.week.workweek,r=a.getViewName(),o.querySelector("input").checked=!t.month.workweek}a.setOptions(t,!0),a.changeView(r,!0),p(),w(),y()}function h(e){switch(C(e.target)){case"move-prev":a.prev();break;case"move-next":a.next();break;case"move-today":a.today();break;default:return}w(),y()}function g(){var e=$("#new-schedule-title").val(),o=$("#new-schedule-location").val(),t=document.getElementById("new-schedule-allday").checked,r=l.getStartDate(),i=l.getEndDate(),d=c||n[0];e&&(a.createSchedules([{id:String(chance.guid()),calendarId:d.id,title:e,isAllDay:t,start:r,end:i,category:t?"allday":"time",dueDateClass:"",color:d.color,bgColor:d.bgColor,dragBgColor:d.bgColor,borderColor:d.borderColor,raw:{location:o},state:"Busy"}]),$("#modal-new-schedule").modal("hide"))}function m(e){!function(e){var o=document.getElementById("calendarName"),n=r(e),a=[];a.push('<span class="calendar-bar" style="background-color: '+n.bgColor+"; border-color:"+n.borderColor+';"></span>'),a.push('<span class="calendar-name">'+n.name+"</span>"),o.innerHTML=a.join(""),c=n}(C($(e.target).closest('a[role="menuitem"]')[0]))}function f(e){var o=e.start?new Date(e.start.getTime()):new Date,n=e.end?new Date(e.end.getTime()):moment().add(1,"hours").toDate();a.openCreationPopup({start:o,end:n})}function b(e){var o=e.target.value,a=e.target.checked,t=document.querySelector(".lnb-calendars-item input"),l=Array.prototype.slice.call(document.querySelectorAll("#calendarList input")),c=!0;"all"===o?(c=a,l.forEach((function(e){var o=e.parentNode;e.checked=a,o.style.backgroundColor=a?o.style.borderColor:"transparent"})),n.forEach((function(e){e.checked=a}))):(r(o).checked=a,c=l.every((function(e){return e.checked})),t.checked=!!c),k()}function k(){var e=Array.prototype.slice.call(document.querySelectorAll("#calendarList input"));n.forEach((function(e){a.toggleSchedules(e.id,!e.checked,!1)})),a.render(!0),e.forEach((function(e){var o=e.nextElementSibling;o.style.backgroundColor=e.checked?o.style.borderColor:"transparent"}))}function p(){var e,o=document.getElementById("calendarTypeName"),n=document.getElementById("calendarTypeIcon"),t=a.getOptions(),r=a.getViewName();"day"===r?(r="Daily",e="calendar-icon ic_view_day"):"week"===r?(r="Weekly",e="calendar-icon ic_view_week"):2===t.month.visibleWeeksCount?(r="2 weeks",e="calendar-icon ic_view_week"):3===t.month.visibleWeeksCount?(r="3 weeks",e="calendar-icon ic_view_week"):(r="Monthly",e="calendar-icon ic_view_month"),o.innerHTML=r,n.className=e}function w(){var e=document.getElementById("renderRange"),o=a.getOptions(),n=a.getViewName(),t=[];"day"===n?t.push(moment(a.getDate().getTime()).format("YYYY.MM.DD")):"month"===n&&(!o.month.visibleWeeksCount||o.month.visibleWeeksCount>4)?t.push(moment(a.getDate().getTime()).format("YYYY.MM")):(t.push(moment(a.getDateRangeStart().getTime()).format("YYYY.MM.DD")),t.push(" ~ "),t.push(moment(a.getDateRangeEnd().getTime()).format(" MM.DD"))),e.innerHTML=t.join("")}function y(){var e,o,t;a.clear(),e=a.getViewName(),o=a.getDateRangeStart(),t=a.getDateRangeEnd(),i=[],n.forEach((function(n){var a=0,r=10;for("month"===e?r=3:"day"===e&&(r=4);a<r;a+=1)u(n,o,t)})),a.createSchedules(i),k()}function C(e){return e.dataset?e.dataset.action:e.getAttribute("data-action")}(a=new o("#calendar",{defaultView:"month",useCreationPopup:true,useDetailPopup:!0,calendars:n,template:{milestone:function(e){return'<span class="calendar-font-icon ic-milestone-b"></span> <span style="background-color: '+e.bgColor+'">'+e.title+"</span>"},allday:function(e){return d(e,!0)},time:function(e){return d(e,!1)}}})).on({clickMore:function(e){console.log("clickMore",e)},clickSchedule:function(e){console.log("clickSchedule",e)},clickDayname:function(e){console.log("clickDayname",e)},beforeCreateSchedule:function(e){console.log("beforeCreateSchedule",e),function(e){var o=e.calendar||r(e.calendarId),n={id:String(chance.guid()),title:e.title,isAllDay:e.isAllDay,start:e.start,end:e.end,category:e.isAllDay?"allday":"time",dueDateClass:"",color:o.color,bgColor:o.bgColor,dragBgColor:o.bgColor,borderColor:o.borderColor,location:e.location,raw:{class:e.raw.class},state:e.state};o&&(n.calendarId=o.id,n.color=o.color,n.bgColor=o.bgColor,n.borderColor=o.borderColor);a.createSchedules([n]),k()}(e)},beforeUpdateSchedule:function(e){var o=e.schedule,n=e.changes;console.log("beforeUpdateSchedule",e),a.updateSchedule(o.id,o.calendarId,n),k()},beforeDeleteSchedule:function(e){console.log("beforeDeleteSchedule",e),a.deleteSchedule(e.schedule.id,e.schedule.calendarId)},afterRenderSchedule:function(e){e.schedule},clickTimezonesCollapseBtn:function(e){return console.log("timezonesCollapsed",e),e?a.setTheme({"week.daygridLeft.width":"77px","week.timegridLeft.width":"77px"}):a.setTheme({"week.daygridLeft.width":"60px","week.timegridLeft.width":"60px"}),!0}}),t=tui.util.throttle((function(){a.render()}),50),e.cal=a,p(),w(),y(),$("#menu-navi").on("click",h),$('.dropdown-menu a[role="menuitem"]').on("click",s),$("#lnb-calendars").on("change",b),$("#btn-save-schedule").on("click",g),$("#btn-new-schedule").on("click",f),$("#dropdownMenu-calendars-list").on("click",m),e.addEventListener("resize",t)}(window,tui.Calendar),l=document.getElementById("calendarList"),c=[],n.forEach((function(e){c.push('<div class="lnb-calendars-item"><label><input type="checkbox" class="tui-full-calendar-checkbox-round" value="'+e.id+'" checked><span style="border-color: '+e.borderColor+"; background-color: "+e.borderColor+';"></span><span>'+e.name+"</span></label></div>")})),l.innerHTML=c.join("\n")})();