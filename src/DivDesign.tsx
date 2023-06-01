import React from 'react';
import {
  Table,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Typography,
  TableBody,
} from "@mui/material";
import { Box } from "@mui/system";
import DivRow from './design/DivRowDesign';
import calls from "./meetings.json";

const textCells = {
    fontWeigth: "400!important",
    color: "#152536",
    fontSize: "16px",
    fontFamily: "Open Sans",
};

const DivDesign: React.FC = () => {
    return (
        <Box
            sx={{
            margin: "20px 0 20px 0",
            background: "#ffffff",
            border: "1px solid #EFF0F4",
            borderRadius: "8px",
            }}
        >
            <TableContainer>
            <Table
                className="program-table"
                width="100%"
                aria-label="simple table"
            >
                <TableHead>
                </TableHead>
                <TableBody>
                {calls ? (
                  calls.meetings.map((item) => (
                    <DivRow data={item} key={item.id} />
                  ))
                ) : (
                  <TableRow>
                    <TableCell component="td">
                      <span>
                        <Typography>No calls Found</Typography>
                      </span>
                    </TableCell>
                  </TableRow>
                )}
                </TableBody>
            </Table>
            </TableContainer>
        </Box>
    )
};

export default DivDesign;