// src/logic/LogicPage.jsx
import { useEffect, useState } from "react";
import axios from "axios";
import HtmlPage from "../components/HtmlPage";

function LogicPage() {
  const [departments, setDepartments] = useState([]);
  const [doctors, setDoctors] = useState([]);
  const [selectedDoctor, setSelectedDoctor] = useState("");
  const [date, setDate] = useState("");
  const [availableSlots, setAvailableSlots] = useState([]);
  const [bookedSlots, setBookedSlots] = useState([]);

  useEffect(() => {
    loadData();
  }, []);

  useEffect(() => {
    if (selectedDoctor && date) {
      loadSlots();
    }
  }, [selectedDoctor, date]);

  const loadData = async () => {
    try {
      const depRes = await axios.get("/api/departments");
      const docRes = await axios.get("/api/doctors");

      console.log("Departments:", depRes.data);
    console.log("Doctors:", docRes.data);

      setDepartments(depRes.data);
      setDoctors(docRes.data);
    } catch (err) {
      console.error("LOAD DATA ERROR", err.response?.data || err.message);
    }
  };

  const loadSlots = async () => {
    try {
      const res = await axios.get(
        `/api/doctors/${selectedDoctor}/available-slots?date=${date}`
      );
      setAvailableSlots(res.data.available_slots || []);
      setBookedSlots(res.data.booked_slots || []);
    } catch (err) {
      console.error("LOAD SLOT ERROR", err);
    }
  };

  return (
    <HtmlPage
      departments={departments}
      doctors={doctors}
      date={date}
      setDate={setDate}
      selectedDoctor={selectedDoctor}
      setSelectedDoctor={setSelectedDoctor}
      availableSlots={availableSlots}
      bookedSlots={bookedSlots}
    />
  );
}

export default LogicPage;
