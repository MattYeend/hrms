<template>
    <div class="container mb-3em">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div ref="calendar" id="calendar"></div>
            </div>
        </div>
    </div>
</template>

<script>
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from "axios";

export default {
    data() {
        return {
            calendar: null,
            calendarPlugins: [dayGridPlugin, interactionPlugin],
            events: [],
            countries: [
                { code: 'GB', name: 'UK' },
                { code: 'FR', name: 'France' },
                { code: 'US', name: 'USA' },
                { code: 'IT', name: 'Italy' },
                { code: 'ES', name: 'Spain' }
            ],
        };
    },
    mounted() {
        this.initCalendar();
        this.getPublicHolidays();
        this.getLeaves();
        this.getMeetings();
        this.getRotas();
    },
    methods: {
        initCalendar() {
            const calendarEl = this.$refs.calendar;
            this.calendar = new Calendar(calendarEl, {
                plugins: this.calendarPlugins,
                events: this.events,
                eventClick: this.showEvent,
            });
            this.calendar.render();
        },
        async getPublicHolidays() {
            try {
                const response = await axios.get('/api/holidays');
                const holidaysData = response.data;

                let holidayEvents = [];

                for (const country of this.countries) {
                    const holidays = holidaysData[country.name];

                    if (holidays) {
                        holidays.forEach(holiday => {
                            holiday.dates.forEach(date => {
                                holidayEvents.push({
                                    title: `${holiday.name} (${country.code})`,
                                    start: date,
                                    allDay: true,
                                    backgroundColor: 'blue',
                                    borderColor: 'blue',
                                });
                            });
                        });
                    }
                }

                // Add the events to FullCalendar
                this.events = holidayEvents;
                this.calendar.addEventSource(holidayEvents);
            } catch (error) {
                console.error('Error fetching holidays:', error);
            }
        },
        async getLeaves() {
            try {
                const response = await axios.get('/api/leaves');
                const leaves = response.data;

                let leaveEvents = [];

                leaves.forEach(leave => {
                    let color;
                    if (leave.status_id === 2) {
                        color = '#98fb98';  // Pending
                    } else if (leave.status_id === 1) {
                        color = '#06402B';  // Approved
                    } else if (leave.status_id === 3) {
                        return; // Cancelled or Rejected, do not add to calendar
                    }
					
					const leaveTypeName = leave.leave_type ? leave.leave_type.name : 'Unknown Leave';
                    leaveEvents.push({
                        title: `Leave (${leaveTypeName})`,
                        start: leave.date_from,
                        end: new Date(new Date(leave.date_to).getTime() + 86400000),
                        allDay: true,
                        backgroundColor: color,
                        borderColor: color,
                    });
                });

                this.calendar.addEventSource(leaveEvents);
            } catch (error) {
                console.error('Error fetching leaves:', error);
            }
        },
        async getMeetings() {
            try {
                const response = await axios.get('/api/meetings');
                const meetings = response.data;

                let meetingEvents = [];

                meetings.forEach(meeting => {
                    // Ensure that the meetingType and dates are correctly mapped
                    const meetingTypeName = meeting.meetingType;
                    const startDate = meeting.scheduled_at;
                    
                    meetingEvents.push({
                        title: `Meeting (${meetingTypeName})`,
                        start: startDate, 
                        end: startDate,
                        allDay: true,
                        backgroundColor: '#FFA07A',
                        borderColor: '#FFA07A',
                    });
                });

                this.calendar.addEventSource(meetingEvents);
            } catch (error) {
                console.error('Error fetching meetings:', error);
            }
        },
        async getRotas() {
            try {
                const response = await axios.get('/api/rotas');
                const rotas = response.data;

                let rotaEvents = [];

                rotas.forEach(rota => {
                    const userName = rota.user ? `${rota.user.first_name} ${rota.user.last_name}` : 'Unknown User';

                    rotaEvents.push({
                        title: `Rota (${userName})`,
                        start: rota.start_time,
                        end: rota.end_time,
                        allDay: false,
                        backgroundColor: '#6a5acd',
                        borderColor: '#6a5acd',
                    });
                });

                this.calendar.addEventSource(rotaEvents);
            } catch (error) {
                console.error('Error fetching rotas:', error);
            }
        },
        showEvent(arg) {
            // Event click handler logic
            alert(`Event: ${arg.event.title}`);
        },
    },
};
</script>

<style lang="css">
.fc-col-header-cell-cushion {
    text-decoration: none;
    color: inherit;
}
.fc-daygrid-day-number {
    text-decoration: none;
    color: inherit;
}
.fc-title {
    color: #fff;
}
.fc-title:hover {
    cursor: pointer;
}
</style>
