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
	        showEvent(arg) {
    	        // Event click handler logic
				alert(`Holiday: ${arg.event.title}`);
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
