import React, { useEffect, useState } from 'react';
import RenderTable from './RenderTable';
import DivDesign from './DivDesign';
import Dosen from './Dosen';
import {Link, Routes, Route } from 'react-router-dom';
import Home from './components/Home';
import About from './components/About';

const App: React.FC = () => {
  return (
    <div>

      {/* <RenderTable /> */}
      <h3 className="ml-10">Meetings/Design</h3>
      <br/><a href="/about">Link to About Page</a>
      <hr/>
      <p>&#8226; New Booking Request</p>
      <DivDesign />
    </div>
  );
};

export default App;
