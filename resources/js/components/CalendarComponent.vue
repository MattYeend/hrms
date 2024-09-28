<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form @submit.prevent>
          <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" id="event_name" class="form-control" v-model="newEvent.event_name">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" class="form-control" v-model="newEvent.start_date">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" class="form-control" v-model="newEvent.end_date">
              </div>
            </div>
            <div class="col-md-6 mb-4" v-if="addingMode">
              <button class="btn btn-sm btn-primary" @click="addNewEvent">Save Event</button>
            </div>
            <template v-else>
              <div class="col-md-6 mb-4">
                <button class="btn btn-sm btn-success" @click="updateEvent">Update</button>
                <button class="btn btn-sm btn-danger" @click="deleteEvent">Delete</button>
                <button class="btn btn-sm btn-secondary" @click="addingMode = !addingMode">Cancel</button>
              </div>
            </template>
          </div>
        </form>
      </div>
      <div class="col-md-8">
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
      newEvent: {
        event_name: "",
        start_date: "",
        end_date: ""
      },
      addingMode: true,
      indexToUpdate: ""
    };
  },
  mounted() {
    this.initCalendar();
    this.getEvents();
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
    addNewEvent() {
      axios
        .post("/api/calendar", {
          ...this.newEvent
        })
        .then(() => {
          this.getEvents();
          this.resetForm();
        })
        .catch(err => console.log("Unable to add new event!", err.response.data));
    },
    showEvent(arg) {
      this.addingMode = false;
      const event = this.events.find(event => event.id === +arg.event.id);
      if (event) {
        this.indexToUpdate = event.id;
        this.newEvent = {
          event_name: event.title,
          start_date: event.start,
          end_date: event.end
        };
      }
    },
    updateEvent() {
      axios
        .put("/api/calendar/" + this.indexToUpdate, {
          ...this.newEvent
        })
        .then(() => {
          this.resetForm();
          this.getEvents();
          this.addingMode = true;
        })
        .catch(err => console.log("Unable to update event!", err.response.data));
    },
    deleteEvent() {
      axios
        .delete("/api/calendar/" + this.indexToUpdate)
        .then(() => {
          this.resetForm();
          this.getEvents();
          this.addingMode = true;
        })
        .catch(err => console.log("Unable to delete event!", err.response.data));
    },
    getEvents() {
      axios
        .get("/api/calendar")
        .then(resp => {
          this.events = resp.data.data;
          this.calendar.removeAllEvents();
          this.calendar.addEventSource(this.events);
        })
        .catch(err => console.log(err.response.data));
    },
    resetForm() {
      this.newEvent = {
        event_name: "",
        start_date: "",
        end_date: ""
      };
      this.indexToUpdate = "";
    }
  }
};
</script>

<style lang="css">
.fc-title {
  color: #fff;
}

.fc-title:hover {
  cursor: pointer;
}
</style>
