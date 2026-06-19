// src/components/HtmlPage.jsx
function HtmlPage({
  departments = [],
  doctors = [],
  date,
  setDate,
  selectedDoctor,
  setSelectedDoctor,
  availableSlots = [],
  bookedSlots = [],
}) {
  return (
    <div className="container">
      <h3 className="text-muted mb-4" style={{ textAlign: "center" }}>
        Doctor Slot Availability
      </h3>

      <div className="card shadow">
        <div className="card-body">
          <div className="row">
            {/* Department Dropdown */}
            <div className="col-md-4">
              <label>Department</label>
              <select className="form-control" id="department">
                <option>Select Department</option>
                {departments.map((department) => (
                  <option key={department.id} value={department.id}>
                    {department.name}
                  </option>
                ))}
              </select>
            </div>

            {/* Doctor Dropdown */}
            <div className="col-md-4">
              <label>Doctor</label>
              <select
                className="form-control"
                id="doctor"
                value={selectedDoctor}
                onChange={(e) => setSelectedDoctor(e.target.value)}
              >
                <option value="">Select Doctor</option>
                {doctors.map((doctor) => (
                  <option key={doctor.id} value={doctor.id}>
                    {doctor.name}
                  </option>
                ))}
              </select>
            </div>

            {/* Date Picker */}
            <div className="col-md-4">
              <label>Date</label>
              <input
                type="date"
                className="form-control"
                id="date"
                value={date}
                onChange={(e) => setDate(e.target.value)}
              />
            </div>
          </div>
        </div>
      </div>

      <br />

      <div className="row">
        {/* Available Slots */}
        <div className="col-md-6">
          <div className="card dashboard-card border-success">
            <div className="card-header bg-success text-white">
              Available Slots
            </div>
            <div className="card-body">
              {availableSlots.length === 0 ? (
                <p className="text-muted">No available slots</p>
              ) : (
                <table className="table">
                  <thead>
                    <tr>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    {availableSlots.map((slot, i) => (
                      <tr key={i}>
                        <td>{slot}</td>
                        <td className="text-success">Available</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              )}
            </div>
          </div>
        </div>

        {/* Booked Slots */}
        <div className="col-md-6">
          <div className="card dashboard-card border-danger">
            <div className="card-header bg-danger text-white">
              Booked Slots
            </div>
            <div className="card-body">
              {bookedSlots.length === 0 ? (
                <p className="text-muted">No booked slots</p>
              ) : (
                <table className="table">
                  <thead>
                    <tr>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    {bookedSlots.map((slot, i) => (
                      <tr key={i}>
                        <td>{slot}</td>
                        <td className="text-danger">Booked</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default HtmlPage;
