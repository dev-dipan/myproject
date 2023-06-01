import React, { useEffect, useState } from 'react';
import TableDesign from './TableDesign';
import axios from 'axios';

interface TableData {
  id: number;
  userId: number;
  title: string;
  body: string;
}

const RenderTable: React.FC = () => {
  const [tableData, setTableData] = useState<TableData[]>([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get('https://jsonplaceholder.typicode.com/posts');
        const data = response.data;
        setTableData(data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);

  return (
    <div>
      <h1>Test Table Fetching from Rest API</h1>
      <TableDesign data={tableData} />
    </div>
  );
};

export default RenderTable;