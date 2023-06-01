import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

interface TableData {
  id: number;
  userId: number;
  title: string;
  body: string;
}

interface TableProps {
  data: TableData[];
}

const TableDesign: React.FC<TableProps> = ({ data }) => {
  return (
    <table className="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>User ID</th>
          <th>Title</th>
          <th>Body</th>
        </tr>
      </thead>
      <tbody>
        {data.map((item) => (
          <tr key={item.id}>
            <td>{item.id}</td>
            <td>{item.userId}</td>
            <td>{item.title}</td>
            <td>{item.body}</td>
          </tr>
        ))}
      </tbody>
    </table>
  );
};

export default TableDesign;